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
        Schema::create('rota_imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->bigInteger('rota_id')->unsigned();
            $table->foreign('rota_id')
                ->references('id')
                ->on('rotas')
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
        Schema::dropIfExists('rota_imgs');
    }
};
