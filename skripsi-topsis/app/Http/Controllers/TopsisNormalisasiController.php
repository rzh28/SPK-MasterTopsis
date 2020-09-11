<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopsisNormalisasiController extends Controller
{

    public function nilaiNormalisasi($karyawan_id)
    {
        $nilaiKet = DB::table('nilai_normalisasis')
            ->where('karyawans_id', '=', $karyawan_id)
            ->get();
        return $nilaiKet;
    }
    public function index()
    {
        $dataNilai = DB::table('nilai_normalisasis')
            ->get();

        $dataKri = DB::table('kriterias')
            ->distinct()
            ->get(['name']);

        $dataKar = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_normalisasis JOIN karyawans ON nilai_normalisasis.karyawans_id = karyawans.id');

        return view('hasil_topsis.index', compact('dataKri', 'dataNilai', 'dataKar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //normalisasi
        // $karyawans = DB::table('karyawans')->get();
        // foreach ($karyawans as $kars) {
        $kriterias = DB::table('kriterias')->get();
        foreach ($kriterias as $krits) {
            $t = 0;
            $nilaiKaryawans = DB::table('nilai_inisials')->where('kriterias_id', '=', $krits->id)->get();
            foreach ($nilaiKaryawans as $nilkars) {
                $q = pow($nilkars->nilai, 2);
                $t = $t + $q;
            }
            $akar = sqrt($t);
            foreach ($nilaiKaryawans as $nilkars) {
                $hasil = $nilkars->nilai / $akar;

                $request->request->add(['nilai' => $hasil]);
                $request->request->add(['nilai_inisials_id' => $nilkars->id]);
                $request->request->add(['kriterias_id' => $nilkars->kriterias_id]);
                $request->request->add(['karyawans_id' => $nilkars->karyawans_id]);
                DB::table('nilai_normalisasis')->insert($request->except('_token'));
            }
        }
        // }

        return redirect(route('hasil_topsis.index'))
            ->with('status', 'Data Berhasil di Proses Perhitungan Topsis');
    }
}
