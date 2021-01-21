<?php

declare(strict_types=1);

namespace App\ValueObject;

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
}
