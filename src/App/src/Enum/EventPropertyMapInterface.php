<?php

declare(strict_types=1);

namespace App\Enum;

class EventPropertyMapInterface
{
    public const PROPERTY_SETTINGS_MAP = [
        'id' => 'setId',
        'name' => 'setName',
        'type' => 'setType',
        'target_date' => 'setTargetDate',
        'is_done' => 'setIsDone',
        'content' => 'setContent',
        'next_check_at' => 'setNextCheckAt',
    ];
}
