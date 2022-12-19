<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("cluster_members", function (Blueprint $table){
            $table->id();
            $table->string("title");
            $table->string("about");
            $table->string("logo");
            $table->float("rating");
            $table->string("type");
            $table->boolean("confirmed");
            $table->string("email");
            $table->string("phone");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
