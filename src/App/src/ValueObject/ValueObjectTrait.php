<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Helper\CommonHelper;

trait ValueObjectTrait
{
    /**
     * @param array $data
     * @param array $map
     */
    public function setProperties(array $data, array $map): void
    {
        foreach ($data as $key => $value) {
            if (empty($map[$key])) {
                continue;
            }

            call_user_func([static::class, $map[$key],], $value);
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        foreach ($this as $key => $value) {
            if ($value === null) {
                continue;
            }

            $convertedKey = CommonHelper::convertFromCamelcaseToUnderscore($key);
            $result[$convertedKey] = $value;
        }

        return $result;
    }
}
