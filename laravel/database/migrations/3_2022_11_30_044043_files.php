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
        Schema::create("files", function (Blueprint $table){
            $table->string("file_id", 10)->primary();
            $table->text("name");
            $table->text("url");
            $table->string("path", 255);
            $table->integer("author_id");
            $table->string("folder_id", 10);
            $table->foreign("author_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("folder_id")->references("folder_id")->on("folders")->onDelete("cascade");
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
