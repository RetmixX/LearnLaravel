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
        Schema::create("specialties_members", function (Blueprint $table){
            $table->id();
            $table->integer("specialty_id")->nullable();
            $table->integer("cluster_member_id");

            $table->foreign("specialty_id")->references("id")->on("specialties")->nullOnDelete();
            $table->foreign("cluster_member_id")->references("id")->on("cluster_members")->cascadeOnDelete();
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
