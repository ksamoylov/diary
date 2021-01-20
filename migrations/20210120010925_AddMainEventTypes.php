<?php

declare(strict_types=1);

use App\Entity\EventTypeEntity;
use App\Repository\EventTypeRepository;
use Phpmig\Migration\Migration;

class AddMainEventTypes extends Migration
{
    /**
     * Do the migration
     */
    public function up(): void
    {
        $eventTypeRepository = new EventTypeRepository();

        $eventTypeRepository->create(
            [
                'name' => 'common',
                'settings' => [
                    'color' => 'grey',
                ],
            ]
        );

        $eventTypeRepository->create(
            [
                'name' => 'training',
                'settings' => [
                    'color' => 'white',
                ],
            ]
        );
    }

    /**
     * Undo the migration
     *
     * @throws Exception
     */
    public function down(): void
    {
        $eventTypeCollection = EventTypeEntity::query()->whereIn('id', [1, 2])->get();

        if (!$eventTypeCollection->isEmpty()) {
            $eventTypeCollection->each(static function(EventTypeEntity $eventTypeEntity) {
                $eventTypeEntity->delete();
            });
        }
    }
}
