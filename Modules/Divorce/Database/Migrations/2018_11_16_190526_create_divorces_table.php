<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivorcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divorces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marriage_id')->unsigned()->nullable()->foreign()->refernces('id')->on('marriages')->delete('restrict')->update('cascade');
            $table->integer('counter');
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
        Schema::dropIfExists('divorces');
    }
}
