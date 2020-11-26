<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblroom', function (Blueprint $table) {
            $table->increments('ID_Room');

            $table->string('Name_Room');

            $table->integer('Empty_Room');

            $table->String('Kind_Room');

            $table->integer('Price_Room');

            $table->integer('Star_Room');

            $table->string('Status_Room');

            $table->string('Img_Room');

            $table->text('Des_Room');

            $table->integer('ID_Hotel')->unsigned()->nullable();
            $table->foreign('ID_Hotel')->references('ID_Hotel')->on('tblhotel')->onDelete('cascade');


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
        Schema::dropIfExists('tblroom');
    }
}
