<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Proxies\ShopifyProxy\ShopifyProxyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::domain("{apiKey}.{apiSecret}.{shopUrl}.shopify.".env('APP_DOMAIN'))->group(function () {
    Route::any('admin', [ShopifyProxyController::class, 'forward']);
});
