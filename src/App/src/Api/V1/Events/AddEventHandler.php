<?php

declare(strict_types=1);

namespace App\Api\V1\Events;

use App\Helper\RequestEventsHelper;
use App\Repository\EventRepository;
use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddEventHandler implements RequestHandlerInterface
{
    private EventRepository $eventRepository;

    /**
     * AddEventHandler constructor.
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
        $parsedData = RequestEventsHelper::getParsedRequestBody($requestBody);

        $this->eventRepository->create($parsedData);

        return new JsonResponse(['ok']);
    }
}
