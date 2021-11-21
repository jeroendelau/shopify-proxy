<?php

namespace App\Http\Controllers;

use App\Models\EtsyToken;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreEtsyTokenRequest;
use App\Http\Requests\UpdateEtsyTokenRequest;

class EtsyTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create() : JsonResponse
    {
        return response()->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEtsyTokenRequest $request
     * @return JsonResponse
     */
    public function store(StoreEtsyTokenRequest $request) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param EtsyToken $entsyToken
     * @return JsonResponse
     */
    public function show(EtsyToken $entsyToken) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EtsyToken $entsyToken
     * @return JsonResponse
     */
    public function edit(EtsyToken $entsyToken) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEtsyTokenRequest $request
     * @param EtsyToken $entsyToken
     * @return JsonResponse
     */
    public function update(UpdateEtsyTokenRequest $request, EtsyToken $entsyToken) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EtsyToken $entsyToken
     * @return JsonResponse
     */
    public function destroy(EtsyToken $entsyToken) : JsonResponse
    {
        return response()->json();
    }
}
