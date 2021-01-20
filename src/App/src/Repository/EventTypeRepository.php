<?php

declare(strict_types=1);

namespace App\Repository;

use App\Collection\EventTypeCollection;
use App\Entity\EventTypeEntity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EventTypeRepository
{
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

    /**
     * @todo сделать нормальный абстрактный репозиторий для сущности с учетом всех операторов
     * @param array $criteria
     * @return EventTypeCollection|Builder[]|Collection
     */
    public function findBy(array $criteria): EventTypeCollection
    {
        return EventTypeEntity::query()
            ->where($criteria)
            ->get();
    }
}
