<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HasilTopsisController extends Controller
{

    public function nilaiNormalisasi($karyawan_id)
    {
        $nilaiKet = DB::table('nilai_normalisasis')
            ->where('karyawans_id', '=', $karyawan_id)
            ->get();
        return $nilaiKet;
    }

    public function nilaiBobot($karyawan_id)
    {
        $nilaiKet = DB::table('nilai_bobots')
            ->where('karyawans_id', '=', $karyawan_id)
            ->get();
        return $nilaiKet;
    }

    public function IdealMax($kriteria_id)
    {
        $nilmax = DB::table('nilai_bobots')
            ->where('kriterias_id', '=', $kriteria_id)
            ->orderBy('nilai', 'desc')
            ->get()
            ->first();
        return $nilmax;
    }

    public function idealMin($kriteria_id)
    {
        $nilmin = DB::table('nilai_bobots')
            ->where('kriterias_id', '=', $kriteria_id)
            ->orderBy('nilai', 'asc')
            ->first();
        return $nilmin;
    }

    public function nilaiJarak($karyawan_id)
    {
        $nilaiKet = DB::table('nilai_jaraks')
            ->where('karyawans_id', '=', $karyawan_id)
            ->get();
        return $nilaiKet;
    }

    public function nilaiPreferensi($karyawan_id)
    {
        $nilaiKet = DB::table('nilai_preferensis')
            ->where('karyawans_id', '=', $karyawan_id)
            ->get();
        return $nilaiKet;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataKri = DB::table('kriterias')
            ->get();

        //panggil data buat normaliasasi
        $dataNor = DB::table('nilai_normalisasis')
            ->get();
        $dataKarN = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_normalisasis JOIN karyawans ON nilai_normalisasis.karyawans_id = karyawans.id');

        //panggil data buat bobot
        $dataW = DB::table('nilai_bobots')
            ->get();
        $dataKarW = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_bobots JOIN karyawans ON nilai_bobots.karyawans_id = karyawans.id');

        //panggil data buat ideal posisif negatif
        $dataI = DB::table('nilai_bobots')
            ->get();
        $dataKarI = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_bobots JOIN karyawans ON nilai_bobots.karyawans_id = karyawans.id');

        //panggil data buat jarak positif dan negatif
        $dataJ = DB::table('nilai_jaraks')
            ->get();
        $dataKarJ = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_jaraks JOIN karyawans ON nilai_jaraks.karyawans_id = karyawans.id');

        //panggil data buat preferensi
        $dataP = DB::table('nilai_preferensis')
            ->get();
        $dataKarP = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_preferensis JOIN karyawans ON nilai_preferensis.karyawans_id = karyawans.id');


        return view('hasil_topsis.index', compact(
            'dataKri',

            'dataNor',
            'dataKarN',
            //
            'dataW',
            'dataKarW',
            //
            'dataJ',
            'dataKarJ',
            //
            'dataP',
            'dataKarP'
        ));
    }

    // public function hitung()
    // {
    //     $karyawans = DB::table('karyawans')->limit(1)->get();
    //     foreach ($karyawans as $kars) {
    //         $nilaiKaryawans = DB::table('nilai_normalisasis')->join('kriterias', 'nilai_normalisasis.kriterias_id', '=', 'kriterias.id')->where('karyawans_id', '=', $kars->id)->where('kriterias_id', '=', 1)->get();
    //         foreach ($nilaiKaryawans as $nilaiw) {
    //             $hasilB = $nilaiw->nilai * $nilaiw->w;
    //             var_dump("hasil " . $nilaiw->nilai . "<br>");
    //             var_dump("hasil " . $nilaiw->w . "<br>");
    //             var_dump("hasil " . $hasilB . "<br>");
    //         }
    //     }
    // }
}
