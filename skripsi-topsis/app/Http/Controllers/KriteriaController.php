<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = DB::table('kriterias')->get();
        return view('kriteria.index', compact('kriteria'));
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
            'name' => 'required',
            'w' => 'required'
        ]);
        DB::table('kriterias')
            ->insert($request->except('_token', '_method'));
        return redirect(route('kriteria.index'))
            ->with('status', 'Data Kriteria Berhasil Ditambahkan');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = DB::table('kriterias')
            ->where('id', $id)
            ->get();
        return view('kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'w' => 'required',
        ]);
        // $kriteria = Kriteria::findOrFail($id);
        // $kriteria->update($request->all());
        // $kriteria->save();

        DB::table('kriterias')
            ->where('id', $id)
            ->update($request->except('_token', '_method'));
        return redirect(route('kriteria.index'))
            ->with('status', 'Data Kriteria Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Kriteria::findOrFail($id);
        $karyawan->delete();
        return redirect(route('kriteria.index'))
            ->with('status', 'Data Kriteria Berhasil Dihapus');
    }
}
