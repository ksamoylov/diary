<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\EventTypeEntity;

class EventTypeRepository extends AbstractRepository
{
    /**
     * EventTypeRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new EventTypeEntity());
    }

    /**
     * @param array $eventTypeData
     */
    public function create(array $eventTypeData): void
    {
        $eventTypeEntity = new EventTypeEntity();

        $eventTypeEntity->setName($eventTypeData['name']);

        if ($eventTypeData['settings']) {
            $eventTypeEntity->setSettings($eventTypeData['settings']);
        }

        $eventTypeEntity->save();
    }
}
