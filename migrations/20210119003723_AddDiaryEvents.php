<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use Phpmig\Migration\Migration;

class AddDiaryEvents extends Migration
{
    private const TABLE_NAME = 'diary_events';

    /**
     * Do the migration
     */
    public function up(): void
    {
        /** @var Manager $schema */
        $schema = $this->get('db');

        $schema::schema()
            ->create(
                self::TABLE_NAME,
                static function (Blueprint $table) {
                    $table->id();
                    $table->string('name')->nullable();

                    $table->timestamp('created_at')->useCurrent();
                    $table->timestamp('updated_at')->useCurrent();
                }
            );

    }

    /**
     * Undo the migration
     */
    public function down(): void
    {
        /** @var Illuminate\Database\Capsule\Manager $schema */
        $schema = $this->get('db');
        $schema::schema()->dropIfExists(self::TABLE_NAME);
    }
}
