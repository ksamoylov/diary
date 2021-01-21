<?php

declare(strict_types=1);

namespace App\Api\V1\Events;

use App\Constraint\EventsAddConstraintFactory;
use App\Repository\EventRepository;
use App\Service\EventsService;
use App\Service\ValidatorTrait;
use App\ValueObject\EventValueObject;
use Fig\Http\Message\StatusCodeInterface;
use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EventsAddHandler implements RequestHandlerInterface
{
    use ValidatorTrait;

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
        $requestBody = (string)$request->getBody();
        $parsedRequestBody = $this->eventsService->getParsedRequestBody($requestBody);
        $violations = $this->validate(EventsAddConstraintFactory::build(), $parsedRequestBody);

        if (!empty($violations)) {
            return new JsonResponse(
                $this->createResponseMessageByViolations($violations),
                StatusCodeInterface::STATUS_BAD_REQUEST
            );
        }

        $eventValueObject = new EventValueObject($parsedRequestBody);

        $eventEntity = $this->eventRepository->create($eventValueObject->toArray());

        return new JsonResponse(
            ['Success' => sprintf('Event %s successfully added', $eventEntity->getName()),]
        );
    }
}
