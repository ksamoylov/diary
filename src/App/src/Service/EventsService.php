<?php

declare(strict_types=1);

namespace App\Service;

use JsonException;

class EventsService
{
    /**
     * @param string $requestBody
     * @return array
     * @throws JsonException
     */
    public function getParsedRequestBody(string $requestBody): array
    {
        return json_decode($requestBody, true, 512, JSON_THROW_ON_ERROR);
    }
}
