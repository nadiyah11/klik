<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tran__masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_masuk');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                  ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('sup_id')->unsigned();
            $table->foreign('sup_id')->references('id')
                  ->on('suppliers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('barang_id')->unsigned();
            $table->foreign('barang_id')->references('id')
                  ->on('barangs')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('hargas');
            $table->integer('jumlahs');
            $table->integer('total');
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
        Schema::dropIfExists('tran__masuks');
    }
}
