<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcomment', function (Blueprint $table) {
            $table->increments('ID_Comment');
            $table->integer('ID_Room')->unsigned()->nullable();
            $table->foreign('ID_Room')->references('ID_Room')->on('tblroom')->onDelete('cascade');

            $table->integer('ID_User')->unsigned()->nullable();
            $table->foreign('ID_User')->references('ID_User')->on('tbluser')->onDelete('cascade');

            $table->string('Content_Comment');

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
        Schema::dropIfExists('tblcomment');
    }
}
