<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface CanForwardRequests
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function forward(Request $request) : JsonResponse;
}
