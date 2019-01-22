<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned()->foreign()->refernces('id')->on('users')->delete('restrict')->update('cascade');
            $table->integer('address_id')->unsigned()->foreign()->refernces('id')->on('addresses')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('work_ins');
    }
}
