<?php

namespace App\Middlewares;

use Routex\Http\{Request, Response};

final class OnlyPostMiddleware
{
    public function handle(Request $request, Response $response, callable $next)
    {
        if ($request->method() !== "POST") {
            $response->status(Response::HTTP_METHOD_NOT_ALLOWED);

            $response->json([
                "error" => "Method Not Allowed. Only POST is accepted.",
            ]);

            exit();
        }

        return $next($request, $response);
    }
}
