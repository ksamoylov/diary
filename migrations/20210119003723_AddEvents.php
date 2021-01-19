<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use Phpmig\Migration\Migration;

class AddEvents extends Migration
{
    private const TABLE_NAME = 'events';

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
                    $table->bigIncrements('id')
                        ->unsigned();
                    $table->string('name', 255);
                    $table->unsignedBigInteger('type_id');
                    $table->timestamp('target_date');
                    $table->boolean('is_done')->default(false);
                    $table->mediumText('content')->nullable();
                    $table->timestamp('checked_at')->nullable();

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
