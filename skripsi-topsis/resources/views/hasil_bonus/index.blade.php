@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Nilai Master</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

@inject('nilai','App\Http\Controllers\HasilBonusController')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Hasil Bonus</li>
    </ol>
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body table-responsive mx-auto">
                            <div class="align-content-center ">
                                <div class="table-wrapper">
                                    <table class="fl-table table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIK</th>
                                                <th>Nama Karyawan</th>
                                                <th>Masuk Kerja</th>
                                                <th>Gaji</th>
                                                <th>Bonus Yang di Dapat</th>
                                            </tr>
                                        <tbody>
                                            </thead>
                                            <?php $no=0; ?>
                                            @foreach ($dataKarB as $kar)
                                            <?php $no++ ?>
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$kar->nik}}</td>
                                                <td style="text-align: left">{{$kar->name}}</td>

                                                {{-- @foreach ($nilai->hasilPref($kar->id) as $pref)
                                                <td>{{round($pref->nilai,5)}}</td>
                                                @endforeach --}}

                                                <td>{{$kar->masuk}}</td>

                                                <td>Rp. {{number_format($kar->gaji,2)}}-</td>

                                                @foreach ($nilai->hasilBns($kar->id) as $nlkar)
                                                <td style="text-align: left">Rp.
                                                    {{number_format($nlkar->bonus,2)}}-</td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- end Table --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
