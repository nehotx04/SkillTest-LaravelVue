<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('quote');
            $table->string('author');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('quote_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites_quotes');
    }
};
