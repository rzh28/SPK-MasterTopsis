<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopsisPreferensiController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //preferensi
        $karyawans = DB::table('karyawans')->get();
        foreach ($karyawans as $kars) {
            $nilaiKaryawans = DB::table('nilai_jaraks')->where('karyawans_id', '=', $kars->id)->get();
            foreach ($nilaiKaryawans as $nilkar) {
                $hasilPref = $nilkar->nilai_min / ($nilkar->nilai_max + $nilkar->nilai_min);
                // var_dump($hasilPref);
            }
            //preferensi
            $request->request->add(['nilai' => $hasilPref]);
            $request->request->add(['nilai_jaraks_id' => $nilkar->id]);
            $request->request->add(['kriterias_id' => $nilkar->kriterias_id]);
            $request->request->add(['karyawans_id' => $nilkar->karyawans_id]);
            DB::table('nilai_preferensis')->insert($request->except('_token'));
        }
        return redirect(route('hasil_topsis.index'))
            ->with('status', 'Data Berhasil di Proses Perhitungan Topsis');
    }
}
