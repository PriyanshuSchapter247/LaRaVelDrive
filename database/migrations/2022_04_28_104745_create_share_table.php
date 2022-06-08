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
        Schema::create('share', function (Blueprint $table) {
            $table->id();
            $table->string('send_from')->nullable();
//            $table->string('send_from');
//            $table->foreign('send_from')->references('id')->on('image')->onDelete('cascade');
            $table->string('send_to')->nullable();
            $table->string('send_image')->nullable();
            $table->string('url')->nullable();
//            $table->string('image_delete')->nullable();
//            $table->foreign('image_delete')->references('deleted_at')->on('image')->onDelete('cascade');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('share');
    }
};
