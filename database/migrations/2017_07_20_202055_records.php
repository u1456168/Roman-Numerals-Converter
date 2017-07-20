<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Records extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::create('records', function (Blueprint $table) {
              $table->increments('id');
              $table->string('RomanNumeral')->index();
              $table->integer('TimesConverted');
              $table->dateTime('LastConverted');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('records');
    }
}
