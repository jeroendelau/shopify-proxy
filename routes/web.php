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

    /**
     * Example url: https://7ef1fccf837de463786559ffef8dd96a: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@pnzdevteststore.myshopify.com/admin/api/2021-10/shop
     */
    Route::domain("{apiKey}.{apiSecret}.{shopUrl}.shopify.{$appDomain}")->group(function () {
        Route::any( '{path?}',[ShopifyProxyController::class, 'forward'] )->name('AnyShopifyRoute')->where('path','.*');
    });
});
