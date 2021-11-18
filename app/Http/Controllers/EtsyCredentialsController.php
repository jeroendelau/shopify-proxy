<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtsyCredentialsRequest;
use App\Http\Requests\UpdateEtsyCredentialsRequest;
use App\Models\EtsyCredentials;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Js;

class EtsyCredentialsController extends Controller
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
     * @param StoreEtsyCredentialsRequest $request
     * @return JsonResponse
     */
    public function store(StoreEtsyCredentialsRequest $request) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param EtsyCredentials $etsyCredentials
     * @return JsonResponse
     */
    public function show(EtsyCredentials $etsyCredentials) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EtsyCredentials $etsyCredentials
     * @return JsonResponse
     */
    public function edit(EtsyCredentials $etsyCredentials) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEtsyCredentialsRequest $request
     * @param EtsyCredentials $etsyCredentials
     * @return JsonResponse
     */
    public function update(UpdateEtsyCredentialsRequest $request, EtsyCredentials $etsyCredentials) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EtsyCredentials $etsyCredentials
     * @return JsonResponse
     */
    public function destroy(EtsyCredentials $etsyCredentials) : JsonResponse
    {
        return response()->json();
    }
}
