<?php

declare(strict_types=1);

namespace App\Api\V1\Events;

use App\Repository\EventRepository;
use App\Service\EventsService;
use App\ValueObject\EventValueObject;
use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EventsAddHandler implements RequestHandlerInterface
{
    private EventsService $eventsService;
    private EventRepository $eventRepository;

    /**
     * EventsAddHandler constructor.
     * @param EventsService $eventsService
     * @param EventRepository $eventRepository
     */
    public function __construct(EventsService $eventsService, EventRepository $eventRepository)
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
        // @todo допилить валидацию
        $requestBody = (string)$request->getBody();
        $parsedData = $this->eventsService->getParsedRequestBody($requestBody);

        $eventValueObject = new EventValueObject($parsedData);

        $eventEntity = $this->eventRepository->create($eventValueObject->toArray());

        return new JsonResponse(
            ['Success' => sprintf('Event %s successfully added', $eventEntity->getName()),]
        );
    }
}
