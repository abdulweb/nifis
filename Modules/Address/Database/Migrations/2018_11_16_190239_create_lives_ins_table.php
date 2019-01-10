<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivesInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lives_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id')->default()->unsigned()->nullable()->foreign()->refernces('id')->on('addresses')->delete('restrict')->update('cascade');
            $table->integer('profile_id')->default()->unsigned()->nullable()->foreign()->refernces('id')->on('profiles')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('lives_ins');
    }
}
