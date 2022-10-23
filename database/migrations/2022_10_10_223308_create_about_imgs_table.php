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
        Schema::create('about_imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->bigInteger('about_id')->unsigned();
            $table->foreign('about_id')
                ->references('id')
                ->on('abouts')
                ->onDelete('cascade');
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
        Schema::dropIfExists('about_imgs');
    }
};
