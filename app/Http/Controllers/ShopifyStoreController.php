<?php

namespace App\Http\Controllers;

use App\Models\ShopifyStore;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreShopifyStoreRequest;
use App\Http\Requests\UpdateShopifyStoreRequest;

class ShopifyStoreController extends Controller
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
     * @param StoreShopifyStoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreShopifyStoreRequest $request) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param ShopifyStore $shopifyStore
     * @return JsonResponse
     */
    public function show(ShopifyStore $shopifyStore) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ShopifyStore $shopifyStore
     * @return JsonResponse
     */
    public function edit(ShopifyStore $shopifyStore) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShopifyStoreRequest $request
     * @param ShopifyStore $shopifyStore
     * @return JsonResponse
     */
    public function update(UpdateShopifyStoreRequest $request, ShopifyStore $shopifyStore) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ShopifyStore $shopifyStore
     * @return JsonResponse
     */
    public function destroy(ShopifyStore $shopifyStore) : JsonResponse
    {
        return response()->json();
    }
}
