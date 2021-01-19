<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Laminas\Di\Config;
use Laminas\ServiceManager\ConfigInterface;
use Laminas\ServiceManager\ServiceManager;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

// Load configuration
$config = require __DIR__ . '/config.php';

$dependencies = $config['dependencies'];
$dependencies['services']['config'] = $config;

// Build container
$container = new ServiceManager($dependencies);

// Setup Laminas-di
$container->setService(ConfigInterface::class, new Config($config));

$dependencies                       = $config['dependencies'];
$dependencies['services']['config'] = $config;

// Build Illuminate Database Manager
$capsule = new Capsule();
$capsuleContainer = $capsule->getContainer();
$capsule->addConnection($container->get('config')['db']);
$capsule->setEventDispatcher(new Dispatcher($capsuleContainer));

$capsuleContainer->alias(EventDispatcher::class, EventDispatcherInterface::class);
$capsuleContainer->bind(
    EventDispatcher::class,
    static function () use ($container) {
        return $container->get(EventDispatcher::class);
    }
);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container->setService(Capsule::class, $capsule);

// Build container
return new ServiceManager($dependencies);
