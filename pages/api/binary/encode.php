<?php

use Routex\Http\{Request, Response};

use App\Controllers\BinaryController;
use App\Middlewares\OnlyPostMiddleware;

$request = Request::capture();
$response = new Response();

$middleware = new OnlyPostMiddleware();

$middleware->handle($request, $response, function ($request, $response) {
    $controller = new BinaryController();
    $controller->encode($request, $response);
});
