<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('religion_id')->unsigned()->foreign()->refernces('id')->on('religions')->delete('restrict')->update('cascade');
            $table->integer('tribe_id')->unsigned()->foreign()->refernces('id')->on('tribes')->delete('restrict')->update('cascade');
            $table->integer('family_scale_id')->unsigned()->foreign()->refernces('id')->on('family_scales')->delete('restrict')->update('cascade');
            $table->char('family_name')->unique();
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
        Schema::dropIfExists('families');
    }
}
