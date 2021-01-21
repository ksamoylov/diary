<?php

declare(strict_types=1);

namespace App\Api\V1\Events;

use App\Helper\RequestEventsService;
use App\Repository\EventRepository;
use App\Service\EventsService;
use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EventsAddHandler implements RequestHandlerInterface
{
    private EventRepository $eventRepository;

    /**
     * EventsAddHandler constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
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
        $parsedData = EventsService::getParsedRequestBody($requestBody);

        $this->eventRepository->create($parsedData);

        return new JsonResponse(['Success' => 'Event successfully added']);
    }
}
