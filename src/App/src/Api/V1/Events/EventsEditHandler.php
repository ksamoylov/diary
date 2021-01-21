<?php

declare(strict_types=1);

namespace App\Api\V1\Events;

use App\Repository\EventRepository;
use App\Service\EventsService;
use App\ValueObject\EventValueObject;
use Fig\Http\Message\StatusCodeInterface;
use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EventsEditHandler implements RequestHandlerInterface
{
    private EventsService $eventsService;
    private EventRepository $eventRepository;

    /**
     * EventsEditHandler constructor.
     * @param EventsService $eventsService
     * @param EventRepository $eventRepository
     */
    public function __construct(EventsService $eventsService,EventRepository $eventRepository)
    {
        $this->eventsService = $eventsService;
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws JsonException
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = (string)$request->getBody();
        $parsedData = $this->eventsService->getParsedRequestBody($requestBody);

        $eventId = (int)($parsedData['id'] ?? null);

        // @todo после добавления констрейнта убрать проверку
        if (empty($eventId)) {
            return new JsonResponse(['Error' => 'Bad request', StatusCodeInterface::STATUS_BAD_REQUEST]);
        }

        $eventEnity = $this->eventRepository->findOneBy(['id' => $eventId]);

        if ($eventEnity === null) {
            return new JsonResponse(
                ['Error' => sprintf('Event with id %d not found', $eventId),],
                StatusCodeInterface::STATUS_NOT_FOUND
            );
        }

        $eventValueObject = new EventValueObject($parsedData);

        $this->eventRepository->update($eventEnity, $eventValueObject->toArray());

        return new JsonResponse(['Success' => sprintf('Event %s successfully updated', $eventEnity->getName()),]);
    }
}
