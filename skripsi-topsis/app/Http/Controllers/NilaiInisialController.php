<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiInisialController extends Controller
{
    public function nilaiInisial($karyawan_id)
    {
        $nilaiKet = DB::table('nilai_inisials')
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
        $dataNilai = DB::table('nilai_inisials')
            ->get();
        $dataKri = DB::table('kriterias')
            ->distinct()
            ->get(['name']);
        $dataKar = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilai_inisials JOIN karyawans ON nilai_inisials.karyawans_id = karyawans.id');
        return view('nilai_inisial.index', compact('dataKri', 'dataKar', 'dataNilai'));
    }

    public function store(Request $request)
    {
        $karyawans = DB::table('karyawans')->get();
        foreach ($karyawans as $kars) {
            $nilaiKaryawans = DB::table('nilais')->where('karyawans_id', '=', $kars->id)->get();
            foreach ($nilaiKaryawans as $nilkars) {
                if ($nilkars->nilai >= 81 && $nilkars->nilai <= 100) {
                    $inisial = 5;
                    // var_dump($inisial);
                } elseif ($nilkars->nilai >= 61 && $nilkars->nilai <= 80) {
                    $inisial = 4;
                    // var_dump($inisial);
                } elseif ($nilkars->nilai >= 41 && $nilkars->nilai <= 60) {
                    $inisial = 3;
                    // var_dump($inisial);
                } elseif ($nilkars->nilai >= 21 && $nilkars->nilai <= 40) {
                    $inisial = 2;
                    // var_dump($inisial);
                } elseif ($nilkars->nilai >= 1 && $nilkars->nilai <= 20) {
                    $inisial = 1;
                    // var_dump($inisial);
                }
                $request->request->add(['nilai' => $inisial]);
                $request->request->add(['nilais_id' => $nilkars->id]);
                $request->request->add(['kriterias_id' => $nilkars->kriterias_id]);
                $request->request->add(['karyawans_id' => $nilkars->karyawans_id]);
                DB::table('nilai_inisials')->insert($request->except('_token'));
            }
        }
        return redirect(route('nilai_insial.index'))
            ->with('status', 'Data Nilai Berhasil di Inisialisasikan Ditambahkan');
    }
}
