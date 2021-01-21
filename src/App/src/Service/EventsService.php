<?php

declare(strict_types=1);

namespace App\Service;

use JsonException;

class EventsService
{
    /**
     * @todo доделать вместе с constraint
     * @param string $requestBody
     */
    public static function validate(string $requestBody)
    {

    }

    /**
     * @param string $requestBody
     * @return array
     * @throws JsonException
     */
    public static function getParsedRequestBody(string $requestBody): array
    {
        return json_decode($requestBody, true, 512, JSON_THROW_ON_ERROR);
    }
}
