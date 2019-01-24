<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned()->foreign()->refernces('id')->on('profiles')->delete('restrict')->update('cascade');
            $table->integer('contact_refrence_id')->unsigned()->foreign()->refernces('id')->on('contact_refrences')->delete('restrict')->update('cascade');            
            $table->string('contact'); 
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
        Schema::dropIfExists('profile_contacts');
    }
}
