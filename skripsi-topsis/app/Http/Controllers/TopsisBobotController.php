<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopsisBobotController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //bobot
        $karyawans = DB::table('karyawans')->get();
        foreach ($karyawans as $kars) {
            $nilaiKaryawans = DB::table('nilai_normalisasis')->join('kriterias', 'nilai_normalisasis.kriterias_id', '=', 'kriterias.id')->where('karyawans_id', '=', $kars->id)->get();
            foreach ($nilaiKaryawans as $nilaiw) {
                $hasilB = $nilaiw->nilai * $nilaiw->w;
                $request->request->add(['nilai' => $hasilB]);
                $request->request->add(['nilai_normalisasis_id' => $nilaiw->id]);
                $request->request->add(['kriterias_id' => $nilaiw->kriterias_id]);
                $request->request->add(['karyawans_id' => $nilaiw->karyawans_id]);
                DB::table('nilai_bobots')->insert($request->except('_token'));
            }
        }

        return redirect(route('hasil_topsis.index'))
            ->with('status', 'Data Berhasil di Proses Perhitungan Topsis');
    }
}
