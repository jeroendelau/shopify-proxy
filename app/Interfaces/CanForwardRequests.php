<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface CanForwardRequests
{
    public function forward(Request $request) : JsonResponse;
}
