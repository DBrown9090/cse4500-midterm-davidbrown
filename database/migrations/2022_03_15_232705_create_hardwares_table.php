<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->integer('ManufacturerID');
            $table->integer('CategoryID');
            $table->string('CPU');
            $table->string('RAM');
            $table->string('Storage');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('hardwares', function (Blueprint $table) {
            $table->foreign('ManufacturerID')->references('id')->on('manufacturers');
            $table->foreign('CategoryID')->references('id')->on('hwcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hardwares');
    }
}
