<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiNormalisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_normalisasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('nilai');
            $table->unsignedBigInteger('nilai_inisials_id');
            $table->unsignedBigInteger('kriterias_id');
            $table->unsignedBigInteger('karyawans_id');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            // $table->unsignedBigInteger('nilai_inisials_id');

            // Foreign key Tabel Nilai
            $table->foreign('nilai_inisials_id')
                ->references('id')->on('nilai_inisials')
                ->onDelete('cascade');
            // Foreign key Tabel Kriteria
            $table->foreign('kriterias_id')
                ->references('id')->on('kriterias')
                ->onDelete('cascade');
            // Foreign key Tabel Karyawan
            $table->foreign('karyawans_id')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_normalisasis');
    }
}
