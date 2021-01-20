<?php

declare(strict_types=1);

namespace App\Api\V1\Events;

use App\Repository\EventRepository;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EventsListHandler implements RequestHandlerInterface
{
    private EventRepository $eventRepository;

    /**
     * EventsListHandler constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $eventCollection = $this->eventRepository->findBy([]);

        return new JsonResponse($eventCollection->toArray());
    }
}
