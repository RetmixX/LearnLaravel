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
        Schema::create("students", function (Blueprint $table){
            $table->id();
            $table->string("surname");
            $table->string("name");
            $table->string("patronymic");
            $table->string("login");
            $table->string("password");
            $table->float("rating");
            $table->string("about");
            $table->string("email");
            $table->string("phone");
            $table->date("year_start");
            $table->date("year_end");
            $table->integer("course");
            $table->string("group");
            $table->integer("special_id")->nullable();
            $table->boolean("confirmed");

            $table->foreign("special_id")->references("id")->on("specialties_members")->nullOnDelete();

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
