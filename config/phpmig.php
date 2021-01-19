<?php

declare(strict_types=1);

use Doctrine\DBAL\Types\StringType;
use Illuminate\Database\Capsule\Manager as Capsule;
use Laminas\ServiceManager\ServiceManager;
use Phpmig\Adapter;

/** @var ServiceManager $container */
$container = require __DIR__ . '/container.php';

$dbConfig = $container->get('config')['db'];

/**
 * Конфигурируем phpmig.adapter
 * для хранения информации о выполненных миграциях в базе.
 */
$phpMig = new ArrayObject();

/** @var $manager Capsule */
$manager = $container->get(Capsule::class);
$manager::schema()->registerCustomDoctrineType(StringType::class, 'char', 'char');

$phpMig['db'] = $manager;
$phpMig['phpmig.adapter'] = new Adapter\Illuminate\Database($container->get(Capsule::class), 'migrations');
$phpMig['phpmig.migrations_path'] = __DIR__ . '/../migrations';

return $phpMig;
