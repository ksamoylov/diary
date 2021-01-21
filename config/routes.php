<?php

declare(strict_types=1);

use App\Api\V1\Events\EventsAddHandler;
use App\Api\V1\Events\EventsEditHandler;
use App\Api\V1\Events\EventsListHandler;
use Mezzio\Application;

return static function (Application $app): void {
    $app->get('/api/v1/events/list', EventsListHandler::class, 'events.list');
    $app->post('/api/v1/events/add', EventsAddHandler::class, 'events.add');
    $app->post('/api/v1/events/edit', EventsEditHandler::class, 'events.edit');
};
