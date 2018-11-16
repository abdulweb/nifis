<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned()->foreign()->refernces('id')->on('families')->delete('restrict')->update('cascade');
            $table->integer('sub_family_id')->unsigned()->foreign()->refernces('id')->on('families')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('sub_families');
    }
}
