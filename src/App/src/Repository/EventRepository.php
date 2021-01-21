<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\EventEntity;
use App\Enum\EventPropertyMapInterface;
use Illuminate\Database\Eloquent\Model;

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
     * @param array $properties
     * @return Model|EventEntity
     */
    public function create(array $properties): EventEntity
    {
        $eventEntity = $this->setProperties(
            new EventEntity(),
            $properties,
            EventPropertyMapInterface::PROPERTY_SETTINGS_MAP
        );

        $eventEntity->save();

        return $eventEntity;
    }

    /**
     * @param EventEntity $eventEntity
     * @param array $properties
     * @return Model|EventEntity
     */
    public function update(EventEntity $eventEntity, array $properties): EventEntity
    {
        $eventEntityToUpdate = $this->setProperties(
            $eventEntity,
            $properties,
            EventPropertyMapInterface::PROPERTY_SETTINGS_MAP
        );

        $eventEntityToUpdate->save();

        return $eventEntityToUpdate;
    }
}
