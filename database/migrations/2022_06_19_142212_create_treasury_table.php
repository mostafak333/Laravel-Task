<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasury', function (Blueprint $table) {


            $table->integer('id')->autoIncrement()->unsigned(false);
            $table->integer('status');
            $table->integer('locationId');
            $table->float('weight');
            $table->timestamps();
        });
        Schema::table('treasury', function (Blueprint $table) {
            $table->foreign('locationId')->references('id')->on('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treasury');
    }
}
