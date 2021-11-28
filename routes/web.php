<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbayController;
use App\Http\Controllers\EtsyController;
use App\Http\Controllers\ShopifyController;

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

Route::any('/etsy/{path?}',[EtsyController::class, 'sendToForwarder'])
    ->where('path','.*')
    ->name('AnyEtsyRoute');

Route::any( '/ebay/{path?}',[EbayController::class, 'sendToForwarder'] )
    ->where('path','.*')
    ->name('AnyEbayRoute');

Route::any( '/{path?}',[ShopifyController::class, 'sendToForwarder'] )
    ->where('path','.*')
    ->name('AnyShopifyRoute');
