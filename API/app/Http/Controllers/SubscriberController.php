<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Services\SubscriberService;
use Illuminate\Http\JsonResponse;

class SubscriberController extends Controller
{
    public function __construct(
        private SubscriberService $service
    ) {}

    public function index(): JsonResponse
    {
        $subscribers = $this->service->getAll();

        return response()->json([
            'success' => true,
            'data' => $subscribers,
        ]);
    }


    public function store(StoreSubscriberRequest $request): JsonResponse
    {
        try {
            $subscriber = $this->service->create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Inscrito salvo com sucesso!',
                'data' => $subscriber,
            ], 201);

        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

}
