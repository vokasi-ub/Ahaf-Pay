<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rekap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap', function (Blueprint $table) {
            $table->increments('id_rekap');
            $table->integer('id_admin');
            $table->date('tanggal_rekap');
            $table->string('pemasukan');
            $table->string('bulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
