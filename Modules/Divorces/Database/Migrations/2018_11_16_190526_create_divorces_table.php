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
            $table->integer('counter');
            $table->integer('married_id')->unsigned()->default(0)->nullable();
            $table->integer('date')->nullable();
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
