<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('divorce_detail_id')->unsigned()->nullable()->foreign()->refernces('id')->on('divorce_details')->delete('restrict')->update('cascade');
            $table->integer('date');
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
        Schema::dropIfExists('return_details');
    }
}
