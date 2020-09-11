<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilBonusController extends Controller
{

    public function hasilBns($karyawan_id)
    {
        $nilaiB = DB::table('hasil_bonuses')
            ->where('karyawans_id', '=', $karyawan_id)
            ->get();
        return $nilaiB;
    }

    // public function hasilPref($karyawan_id)
    // {
    //     $nilaiB = DB::table('nilai_preferensis')
    //         ->where('karyawans_id', '=', $karyawan_id)
    //         ->get();
    //     return $nilaiB;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataB = DB::table('hasil_bonuses')
            ->get();

        $dataKarB = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name, karyawans.gaji, karyawans.masuk FROM hasil_bonuses JOIN karyawans ON hasil_bonuses.karyawans_id = karyawans.id');

        return view('hasil_bonus.index', compact('dataB', 'dataKarB'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $karyawan = DB::table('karyawans')->get();
        foreach ($karyawan as $kar) {
            $bonus = 0;
            $gaji = $kar->gaji;
            $tanggalMasuk = $kar->masuk;

            $dateIn = date_create($tanggalMasuk);
            $dateNow = date_create();
            $diff = date_diff($dateIn, $dateNow);

            $tahun = $diff->y;
            $bulan = $diff->m;

            if ($tahun < 1) {
                $bonus = (($gaji / 12) * $bulan);
            } elseif ($tahun < 3) {
                $bonus = (($gaji * 90) / 100);
            } elseif ($tahun < 5) {
                $bonus = (($gaji * 100) / 100);
            } elseif ($tahun < 7) {
                $bonus = (($gaji * 110) / 100);
            } elseif ($tahun < 9) {
                $bonus = (($gaji * 120) / 100);
            } elseif ($tahun < 11) {
                $bonus = (($gaji * 130) / 100);
            } elseif ($tahun > 10) {
                $bonus = (($gaji * 140) / 100);
            }

            $request->request->add(['bonus' => $bonus]);
            $request->request->add(['karyawans_id' => $kar->id]);
            DB::table('hasil_bonuses')->insert($request->except('_token'));
        }
        return redirect(route('hasil_bonus.index'))
            ->with('status', 'Data Nilai Berhasil di Inisialisasikan Ditambahkan');
    }
}
