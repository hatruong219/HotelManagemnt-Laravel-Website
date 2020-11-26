<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTbluserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbluser', function (Blueprint $table) {
            $table->increments('ID_User');

            $table->String('Img_User');

            $table->string('Phone_User')->unique();

            $table->string('Pass_User');

            $table->string('Name_User');

            $table->string('Gender_User');

            $table->string('National_User');

            $table->string('Status_User')->nullable();

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
        Schema::dropIfExists('tbluser');
    }
}
