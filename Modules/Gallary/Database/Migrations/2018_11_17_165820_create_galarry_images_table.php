<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalarryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galarry_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned()->foreign()->refernces('id')->on('families')->delete('restrict')->update('cascade');;
            $table->string('image');
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
        Schema::dropIfExists('galarry_images');
    }
}
