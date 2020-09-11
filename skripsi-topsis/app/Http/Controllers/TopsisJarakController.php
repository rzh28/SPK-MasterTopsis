<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopsisJarakController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //jarak
        $karyawans = DB::table('karyawans')->get();
        foreach ($karyawans as $kars) {
            $numnilmax = 0;
            $numnilmin = 0;
            $nilaiKaryawans = DB::table('nilai_bobots')->where('karyawans_id', '=', $kars->id)->get();

            foreach ($nilaiKaryawans as $nilkar) {
                $nilmax = DB::table('nilai_bobots')->where('kriterias_id', '=', $nilkar->kriterias_id)->orderBy('nilai', 'desc')->first();
                $hasilmax = $nilmax->nilai - $nilkar->nilai;
                $powhasilmax = pow($hasilmax, 2);
                $numnilmax = $numnilmax + $powhasilmax;
            }
            $akarhasilmax = sqrt($numnilmax);

            foreach ($nilaiKaryawans as $nilkar) {
                $nilmin = DB::table('nilai_bobots')->where('kriterias_id', '=', $nilkar->kriterias_id)->orderBy('nilai', 'asc')->first();
                $hasilmin = $nilmin->nilai - $nilkar->nilai;
                $powhasilmin = pow($hasilmin, 2);
                $numnilmin = $numnilmin + $powhasilmin;
            }
            $akarhasilmin = sqrt($numnilmin);
            //jarak
            $request->request->add(['nilai_max' => $akarhasilmax]);
            $request->request->add(['nilai_min' => $akarhasilmin]);
            $request->request->add(['nilai_bobots_id' => $nilkar->id]);
            $request->request->add(['kriterias_id' => $nilkar->kriterias_id]);
            $request->request->add(['karyawans_id' => $nilkar->karyawans_id]);
            DB::table('nilai_jaraks')->insert($request->except('_token'));
        }

        return redirect(route('hasil_topsis.index'))
            ->with('status', 'Data Berhasil di Proses Perhitungan Topsis');
    }
}
