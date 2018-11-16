<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vedios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_id')->unsigned()->foreign()->refernces('id')->on('profiles')->delete('restrict')->update('cascade');
            $table->string('vedio_id')->unsigned()->foreign()->refernces('id')->on('vedios')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('user_vedios');
    }
}
