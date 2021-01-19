<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;
use Phpmig\Migration\Migration;

class AddForeignKeyTypeId extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        /** @var Manager $schema */
        $schema = $this->get('db');
        $sql = 'alter table events add foreign key (type_id) references event_types(id)';

        $schema::connection()->statement($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        /** @var Illuminate\Database\Capsule\Manager $schema */
        $schema = $this->get('db');
        $sql = 'alter table events drop foreign key events_ibfk_1';

        $schema::connection()->statement($sql);
    }
}
