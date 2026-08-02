<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

use Dotenv\Dotenv;
use Routex\Http\Request;
use Routex\Routing\Router;

function bootstrap(): void
{
    session_start();

    # Dotenv configuration
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    $router = Router::getInstance();

    $request = Request::capture();

    $router->dispatch($request);
}

bootstrap();
