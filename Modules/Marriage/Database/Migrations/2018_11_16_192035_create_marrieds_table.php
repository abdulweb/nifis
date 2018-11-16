<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarriedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marrieds', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('id');
            $table->integer('husband_id')->default(0)->unsigned()->nullable()->foreign()->refernces('id')->on('husbands')->delete('restrict')->update('cascade');
            $table->integer('wife_id')->default(0)->unsigned()->foreign()->nullable()->refernces('id')->on('wives')->delete('restrict')->update('cascade');
            $table->integer('date');
            $table->integer('is_active')->unsigned()->default(1)->nullable();
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
        Schema::dropIfExists('marrieds');
    }
}
