<?php

declare(strict_types=1);

namespace App\Helper;

use JsonException;

class RequestEventsHelper
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
     * @return mixed
     * @throws JsonException
     */
    public static function getParsedRequestBody(string $requestBody)
    {
        return json_decode($requestBody, true, 512, JSON_THROW_ON_ERROR);
    }
}
