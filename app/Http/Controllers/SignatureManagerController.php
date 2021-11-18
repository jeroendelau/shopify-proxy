<?php

namespace App\Http\Controllers;

use App\Models\SignatureManager;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreSignatureManagerRequest;
use App\Http\Requests\UpdateSignatureManagerRequest;

class SignatureManagerController extends Controller
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
     * @param StoreSignatureManagerRequest $request
     * @return JsonResponse
     */
    public function store(StoreSignatureManagerRequest $request) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param SignatureManager $signatureManager
     * @return JsonResponse
     */
    public function show(SignatureManager $signatureManager) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SignatureManager $signatureManager
     * @return JsonResponse
     */
    public function edit(SignatureManager $signatureManager) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSignatureManagerRequest $request
     * @param SignatureManager $signatureManager
     * @return JsonResponse
     */
    public function update(UpdateSignatureManagerRequest $request, SignatureManager $signatureManager) : JsonResponse
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SignatureManager $signatureManager
     * @return JsonResponse
     */
    public function destroy(SignatureManager $signatureManager) : JsonResponse
    {
        return response()->json();
    }
}
