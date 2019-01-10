<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('births', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('father_id')->unsigned()->nullable()->foreign()->refernces('id')->on('fathers')->delete('restrict')->update('cascade');
            $table->integer('mother_id')->unsigned()->nullable()->foreign()->refernces('id')->on('mothers')->delete('restrict')->update('cascade');
            $table->integer('child_id')->unsigned()->nullable()->foreign()->refernces('id')->on('childrens')->delete('restrict')->update('cascade');
            $table->string('place');
            $table->char('weight');
            $table->integer('date');
            $table->string('deliver_at');
            $table->integer('deliver_id')->default(0)->unsigned()->foreign()->refernces('id')->on('delivers')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('births');
    }
}
