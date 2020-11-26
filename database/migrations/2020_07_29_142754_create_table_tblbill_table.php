<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblbillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbill', function (Blueprint $table) {
            $table->increments('ID_Bill');

            $table->date('Datein_Bill');

            $table->date('Dateout_Bill');

            $table->integer('NumberRoom_Bill');

            $table->integer('Total_Bill');

            $table->string('Status_Bill');

            $table->integer('ID_User')->unsigned()->nullable();
            $table->foreign('ID_User')->references('ID_User')->on('tbluser')->onDelete('cascade');
            $table->integer('ID_Room')->unsigned()->nullable();
            $table->foreign('ID_Room')->references('ID_Room')->on('tblroom')->onDelete('cascade');


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
        Schema::dropIfExists('tblbill');
    }
}
