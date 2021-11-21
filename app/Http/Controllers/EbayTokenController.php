<?php

namespace App\Http\Controllers;

use App\Models\EbayToken;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreEbayTokenRequest;
use App\Http\Requests\UpdateEbayTokenRequest;

class EbayTokenController extends Controller
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
     * @param StoreEbayTokenRequest $request
     * @return JsonResponse
     */
    public function store(StoreEbayTokenRequest $request) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param EbayToken $ebayToken
     * @return JsonResponse
     */
    public function show(EbayToken $ebayToken) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EbayToken $ebayToken
     * @return JsonResponse
     */
    public function edit(EbayToken $ebayToken) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEbayTokenRequest $request
     * @param EbayToken $ebayToken
     * @return JsonResponse
     */
    public function update(UpdateEbayTokenRequest $request, EbayToken $ebayToken) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EbayToken $ebayToken
     * @return JsonResponse
     */
    public function destroy(EbayToken $ebayToken): JsonResponse
    {
        return response()->json();
    }
}
