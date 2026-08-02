<?php

namespace App\Controllers;

use Exception;

use Routex\Http\{Request, Response};
use Routex\Contracts\BaseController;

use App\Services\BinaryService;

final class BinaryController implements BaseController
{
    private BinaryService $service;

    public function __construct()
    {
        $this->service = new BinaryService();
    }

    public function __invoke(Request $request): array
    {
        return [];
    }

    public function encode(Request $request, Response $response): void
    {
        $body = $request->body();

        $text = $body["text"] ?? "";

        if (empty($text)) {
            $response->status(Response::HTTP_BAD_REQUEST);

            $response->json(["error" => "Text is required"]);

            return;
        }

        $result = $this->service->encode($text);

        $response->status(Response::HTTP_OK);

        $response->json(["binary" => $result]);
    }

    public function decode(Request $request, Response $response): void
    {
        $body = $request->body();

        $binary = $body["binary"] ?? "";

        if (empty($binary)) {
            $response->status(Response::HTTP_BAD_REQUEST);

            $response->json(["error" => "Binary is required"]);

            return;
        }

        try {
            $result = $this->service->decode($binary);

            $response->status(Response::HTTP_OK);

            $response->json(["text" => $result]);
        } catch (Exception $e) {
            $response->status(Response::HTTP_INTERNAL_SERVER_ERROR);

            $response->json(["error" => $e->getMessage()]);

            return;
        }
    }
}
