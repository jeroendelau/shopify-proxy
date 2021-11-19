<?php

use Illuminate\Support\Facades\Route;
use App\Proxies\ShopifyProxy\ShopifyProxyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('HomePage');

Route::middleware('redirect.home')->group(function () {
    $appDomain = env('APP_DOMAIN');

    Route::domain("{apiKey}.{apiSecret}.{shopUrl}.shopify.{$appDomain}")->group(function () {
        Route::any('admin', [ShopifyProxyController::class, 'forward'] );
    });
});
