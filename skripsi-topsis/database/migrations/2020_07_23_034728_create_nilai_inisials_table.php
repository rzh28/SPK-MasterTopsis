<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiInisialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_inisials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('nilai');
            $table->unsignedBigInteger('nilais_id');
            $table->unsignedBigInteger('kriterias_id');
            $table->unsignedBigInteger('karyawans_id');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            // // Foreign key Tabel Nilai
            $table->foreign('nilais_id')
                ->references('id')->on('nilais')
                ->onDelete('cascade');
            // Foreign key Tabel Kriteria
            $table->foreign('kriterias_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');
            // Foreign key Tabel Karyawan
            $table->foreign('karyawans_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');


            //softdelete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_inisials');
    }
}
