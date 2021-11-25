<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtsyCredentialsTable extends Migration
{
    /**
     * Run the Migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etsy_credentials', function (Blueprint $table) {
            $table->string('id', 128);
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
        Schema::dropIfExists('etsy_credentials');
    }
}
