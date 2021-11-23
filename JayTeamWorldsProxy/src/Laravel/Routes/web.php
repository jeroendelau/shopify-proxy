<?php

use Illuminate\Support\Facades\Route;
use JayTeamWorlds\Proxy\Library\EbayProxy\EbayProxyController;
use JayTeamWorlds\Proxy\Library\EtsyProxy\EtsyProxyController;
use JayTeamWorlds\Proxy\Library\ShopifyProxy\ShopifyProxyController;

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

Route::middleware('block.if-json-is-unacceptable')->group(function () {
    Route::any( '{path?}',[ShopifyProxyController::class, 'forward'] )
        ->name('AnyShopifyRoute')
        ->where('path','.*');

    Route::any( 'ebay/{clientId}/{path?}',[EbayProxyController::class, 'forward'] )
        ->name('AnyEbayRoute')
        ->where('path','.*');

    Route::any( 'etsy/{path?}',[EtsyProxyController::class, 'forward'] )
        ->name('AnyEtsyRoute')
        ->where('path','.*');
});
