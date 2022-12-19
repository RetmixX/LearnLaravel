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
        Schema::create("vacancies", function (Blueprint $table){
            $table->id();
            $table->string("title");
            $table->string("short_description");
            $table->text("description");
            $table->float("salary");
            $table->integer("cluster_member_id");
            $table->integer("requirement_speciality_id")->nullable();

            $table->foreign("cluster_member_id")->references("id")->on("specialties")->cascadeOnDelete();
            $table->foreign("requirement_speciality_id")->references("id")->on("specialties")->nullOnDelete();
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
