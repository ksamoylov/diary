<?php

declare(strict_types=1);

namespace App\Helper;

class CommonHelper
{
    /**
     * @param string $input
     * @return string
     */
    public static function convertFromCamelcaseToUnderscore(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }
}
