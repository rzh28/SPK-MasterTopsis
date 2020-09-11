@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Nilai Inisialisasi</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Nilai Insialisasi</li>
    </ol>
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body table-responsive mx-auto">
                            <div class="align-content-center ">
                                {{-- Table --}}
                                <div class="table-wrapper">
                                    <form action="{{route('normalisasi.store')}}" method="POST">
                                        @csrf
                                        <table class="fl-table table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIK</th>
                                                    <th>Nama Pegawai</th>
                                                    @foreach ($dataKri as $kri )
                                                    <th>{{$kri->name}}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=0; ?>
                                                @foreach ($dataKar as $kar)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$kar->nik}}</td>
                                                    <td>{{$kar->name}}</td>
                                                    @inject('nilai','App\Http\Controllers\NilaiInisialController')
                                                    @foreach ($nilai->nilaiInisial($kar->id) as $nlkar)
                                                    <td>{{$nlkar->nilai}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary" style="float: right;">Proses
                                            Matrix Normalisasi</button>
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
