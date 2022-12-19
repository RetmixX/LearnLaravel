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
        Schema::create("members_addresses", function (Blueprint $table){
            $table->id();
            $table->integer("cluster_member_id");
            $table->integer("address_id");

            $table->foreign("cluster_member_id")->references("id")->on("cluster_members")->cascadeOnDelete();
            $table->foreign("address_id")->references("id")->on("addresses")->cascadeOnDelete();
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
