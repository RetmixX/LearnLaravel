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
        Schema::create("requirements", function (Blueprint $table){
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->float("salary");
            $table->date("time_execute");
            $table->string("difficult");
            $table->string("status");

            $table->integer("address_id")->nullable();
            $table->integer("student_id")->nullable();
            $table->integer("requirement_speciality_id")->nullable();
            $table->integer("cluster_member_id");
            $table->integer("reviews_id")->nullable();

            $table->foreign("address_id")->references("id")->on("addresses")->nullOnDelete();
            $table->foreign("student_id")->references("id")->on("students")->nullOnDelete();
            $table->foreign("requirement_speciality_id")->references("id")->on("specialties")->nullOnDelete();
            $table->foreign("cluster_member_id")->references("id")->on("cluster_members")->cascadeOnDelete();
            $table->foreign("reviews_id")->references("id")->on("reviews")->nullOnDelete();


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
