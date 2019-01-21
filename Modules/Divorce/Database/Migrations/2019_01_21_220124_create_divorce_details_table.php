<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivorceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divorce_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('divorce_id')->unsigned()->nullable()->foreign()->refernces('id')->on('divorces')->delete('restrict')->update('cascade');
            $table->integer('date');
            $table->string('reason');
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
        Schema::dropIfExists('divorce_details');
    }
}
