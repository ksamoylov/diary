<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\EventEntity;

class EventRepository extends AbstractRepository
{
    /**
     * EventRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new EventEntity());
    }

    /**
     * @param array $eventData
     */
    public function create(array $eventData): void
    {
        $eventEntity = new EventEntity();

        $eventEntity->setName($eventData['name']);
        $eventEntity->setType($eventData['type']);
        $eventEntity->setTargetDate($eventData['target_date']);

        if (!empty($eventData['content'])) {
            $eventEntity->setContent($eventData['content']);
        }

        if (!empty($eventData['next_check_at'])) {
            $eventEntity->setNextCheckAt($eventData['next_check_at']);
        }

        $eventEntity->save();
    }

    /**
     * @param EventEntity $eventEntity
     * @param array $values
     */
    public function update(EventEntity $eventEntity, array $values): void
    {
    }
}
