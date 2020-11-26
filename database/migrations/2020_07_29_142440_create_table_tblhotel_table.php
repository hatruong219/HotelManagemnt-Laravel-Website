<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTblhotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblhotel', function (Blueprint $table) {
            $table->increments('ID_Hotel');

            $table->string('Name_Hotel');

            $table->string('Address_Hotel');

            $table->integer('Level_Hotel');

            $table->string('Img_Hotel');

            $table->text('Information_Hotel');

            $table->integer('ID_Area')->unsigned()->nullable();
            $table->foreign('ID_Area')->references('ID_Area')->on('tblarea')->onDelete('cascade');

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
        Schema::dropIfExists('tblhotel');
    }
}
