<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gold', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unsigned(false);
            $table->integer('barId');
            $table->integer('treasuryId');
            $table->integer('status');
            $table->float('weight');
            $table->timestamps();
        });
        Schema::table('gold', function (Blueprint $table) {
            $table->foreign('treasuryId')->references('id')->on('treasury');
            $table->foreign('barId')->references('id')->on('bar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gold');
    }
}
