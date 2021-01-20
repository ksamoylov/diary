<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;
use Phpmig\Migration\Migration;

class AddForeignKeyTypeId extends Migration
{
    /**
     * Do the migration
     */
    public function up(): void
    {
        /** @var Manager $schema */
        $schema = $this->get('db');
        $sql = 'alter table events add foreign key (type) references event_types(id) on delete cascade';

        $schema::connection()->statement($sql);
    }

    /**
     * Undo the migration
     */
    public function down(): void
    {
        /** @var Illuminate\Database\Capsule\Manager $schema */
        $schema = $this->get('db');
        $sql = 'alter table events drop foreign key events_ibfk_1';

        $schema::connection()->statement($sql);
    }
}
