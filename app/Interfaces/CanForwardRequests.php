<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Shared\SignatureManager;
use Illuminate\Http\JsonResponse;

interface CanForwardRequests
{
    public function forward(Request $request) : JsonResponse;
}
