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
        Schema::create("folders_files", function (Blueprint $table){
           $table->id();
           $table->string("folder_id");
           $table->string("file_id");
           $table->foreign("folder_id")->references("folder_id")->on("folders")->onDelete("cascade");
           $table->foreign("file_id")->references("file_id")->on("files")->onDelete("cascade");
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
