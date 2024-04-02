<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use App\Requests\StatementStorePayloadRequest;

use App\Services\Storage\StorageService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FeedbackController extends Controller
{
    public function __construct(private readonly StorageService $bidService)
    {
    }

    public function store(StatementStorePayloadRequest $request): JsonResponse
    {
        try {
            $this->bidService->bid($request->toArray());

            return response()->json(
                ['message' => 'success']
            );
        } catch (ServiceException) {
            return response()->json(
                ['message' => 'Bad Request'],
                ResponseAlias::HTTP_BAD_REQUEST
            );
        } catch (\Throwable $e) {
            return response()->json(
                ['message' => $e->getMessage()],
                $e->getCode()
            );
        }
    }

}
