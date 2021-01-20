<?php

declare(strict_types=1);

namespace App\Entity;


use App\Collection\EventCollection;
use Illuminate\Database\Eloquent\Model;

class EventTypeEntity extends Model
{
    public const TABLE_NAME = 'event_types';

    protected $table = self::TABLE_NAME;

    protected $casts = [
        'settings' => 'array',
    ];

    /**
     * @param array $models
     * @return EventCollection
     */
    public function newCollection(array $models = []): EventCollection
    {
        return new EventCollection($models);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->setAttribute('name', $name);
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->getAttribute('settings');
    }

    /**
     * @param array $settings
     */
    public function setSettings(array $settings): void
    {
        $this->setAttribute('settings', $settings);
    }
}
