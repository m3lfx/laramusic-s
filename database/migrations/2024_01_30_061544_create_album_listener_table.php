<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumListenerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_listener', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id')->index();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->unsignedBigInteger('listener_id')->index();
            $table->foreign('listener_id')->references('id')->on('listeners')->onDelete('cascade');
            $table->primary(['album_id', 'listener_id']);
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
        Schema::dropIfExists('album_listener');
    }
}
