<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deaths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned()->nullable()->foreign()->refernces('id')->on('profiles')->delete('restrict')->update('cascade');
            $table->integer('user_id')->unsigned()->nullable()->foreign()->refernces('id')->on('users')->delete('restrict')->update('cascade');
            $table->integer('date');
            $table->string('place');
            $table->string('death_at');
            $table->string('about_death');
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
        Schema::dropIfExists('deaths');
    }
}
