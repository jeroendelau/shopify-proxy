<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEbayCredentialsTable extends Migration
{
    /**
     * Run the Migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebay_credentials', function (Blueprint $table) {
            $table->string('id', 128);
            $table->string('app_id', 128);
            $table->boolean('sandbox');
            $table->json('oauth_token');
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the Migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebay_credentials');
    }
}
