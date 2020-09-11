@extends('layouts.admin')

@section('title')
<title>Nilai Master</title>
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Nilai Master</li>
    </ol>
    {{-- @dump() --}}
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
                                    {{-- Start Modal --}}
                                    <a href="{{route('nilai.create')}}" type="button" class="btn btn-primary mb-2"
                                        style=" float: right;">
                                        Tambah Nilai
                                    </a>
                                    <div class="col-6">
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                    </div>
                                    <form action="{{route('nilai_insial.store')}}" method="POST">
                                        @csrf
                                        <table class="fl-table table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
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
                                                    @inject('nilai','App\Http\Controllers\NilaiController')
                                                    @foreach ($nilai->nilaiKar($kar->id) as $nlkar)
                                                    <td>{{$nlkar->nilai}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary"
                                            style="float: right;">Proses</button>
                                    </form>
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
