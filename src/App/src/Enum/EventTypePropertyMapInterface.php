<?php

declare(strict_types=1);

namespace App\Enum;

class EventTypePropertyMapInterface
{
    public const PROPERTY_SETTINGS_MAP = [
        'id' => 'setId',
        'name' => 'setName',
        'settings' => 'setSettings',
    ];
}
