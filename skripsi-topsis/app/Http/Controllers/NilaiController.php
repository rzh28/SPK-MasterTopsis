<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaiImport;
use App\Nilai;

class NilaiController extends Controller
{

    public function nilaiKar($karyawan_id)
    {
        $nilaiKet = DB::table('nilais')
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
        $dataNilai = DB::table('nilais')
            ->get();

        $dataKri = DB::table('kriterias')
            ->distinct()
            ->get(['name']);

        $dataKar = DB::select('SELECT DISTINCT karyawans.id, karyawans.nik, karyawans.name FROM nilais JOIN karyawans ON nilais.karyawans_id = karyawans.id');

        return view('nilai.index', compact('dataKar', 'dataKri', 'dataNilai'));
        // dd($nilai);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataNilai = DB::table('nilais')
            ->take(6)
            ->paginate(6);

        return view('nilai.create', ['dataNilai' => $dataNilai]);
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_nilai', $nama_file);

        // import data
        Excel::import(new NilaiImport, public_path('/file_nilai/' . $nama_file));

        // notifikasi dengan session
        // alihkan halaman kembali
        return redirect(route('nilai.create'))
            ->with('status', 'Data Nilai Master Berhasil di Import');
    }
}
