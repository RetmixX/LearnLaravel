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
        Schema::create("employees", function (Blueprint $table){
            $table->id();
            $table->string("surname");
            $table->string("name");
            $table->string("patronymic")->nullable();
            $table->string("email");
            $table->string("phone");
            $table->string("rank");
            $table->string("login");
            $table->string("password");
            $table->integer("id_cluster")->nullable();

            $table->foreign("id_cluster")->references("id")->on("cluster_members")->nullOnDelete();
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
