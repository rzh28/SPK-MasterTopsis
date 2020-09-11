<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = DB::table('karyawans')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'status' => 'required',
            // 'masaKerja' => 'required',
            'gaji' => 'required'
        ]);
        DB::table('karyawans')
            ->insert($request->except('_token'));
        return redirect(route('karyawan.index'))
            ->with('status', 'Data Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Karyawan $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = DB::table('karyawans')
            ->where('id', $id)
            ->get();
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'status' => 'required',
            // 'masaKerja' => 'required',
            'gaji' => 'required'
        ]);

        DB::table('karyawans')
            ->where('id', $id)
            ->update($request->except('_token', '_method'));
        return redirect(route('karyawan.index'))
            ->with('status', 'Data Karyawan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect(route('karyawan.index'))
            ->with('status', 'Data Karyawan Berhasil Dihapus dan Dipindahkan Ke Trash');
    }

    public function trash()
    {
        $trashKar = Karyawan::onlyTrashed()->get();
        return view('karyawan.trash', ['trashKar' => $trashKar]);
    }

    public function restore($id)
    {
        $trashKar = Karyawan::onlyTrashed();
        $trashKar->findOrFail($id);
        $trashKar->restore();
        return redirect(route('karyawan.trash'));
    }

    public function restore_all()
    {
        $trashKar = Karyawan::onlyTrashed();
        $trashKar->restore();
        return redirect(route('karyawan.trash'));
    }

    public function deleted($id)
    {
        $trashKar = Karyawan::onlyTrashed()
            ->findOrFail($id);
        $trashKar->forceDelete();
        return redirect(route('karyawan.trash'))
            ->with('status', 'Data Karyawan Berhasil Dihapus');
    }
}
