<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use Phpmig\Migration\Migration;

class AddEventTypes extends Migration
{
    private const TABLE_NAME = 'event_types';

    /**
     * Do the migration
     */
    public function up()
    {
        /** @var Manager $schema */
        $schema = $this->get('db');

        $schema::schema()
            ->create(
                self::TABLE_NAME,
                static function (Blueprint $table) {
                    $table->bigIncrements('id')
                        ->unsigned();
                    $table->string('name', 255);
                    $table->json('settings')->nullable();
                }
            );
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        /** @var Illuminate\Database\Capsule\Manager $schema */
        $schema = $this->get('db');

        $schema::schema()->dropIfExists(self::TABLE_NAME);
    }
}
