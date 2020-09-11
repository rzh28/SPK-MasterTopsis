@extends('layouts.admin')
@section('title')
<title>Data Karyawan</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data Karyawan</li>
    </ol>
    <!-- Page Heading -->
    <div class="data-table-container">
        <div class="card justify-content-center">
            <div class="card-header">
                <div class="card-body table-responsive mx-auto">
                    {{-- Table --}}
                    <div class="table-wrapper">
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
                        <a href="{{route('karyawan.restore_all')}}" class="btn btn-warning mb-2" style="float: right">
                            Kembalikan Semua</a>
                        <table class="fl-table table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Status</th>
                                    {{-- <th>Masa Kerja</th> --}}
                                    <th>Gaji Pokok</th>
                                    <th>Restore</th>
                                    <th>Deleted</th>
                                </tr>
                            <tbody>

                                </thead>
                                <?php $no=0; ?>
                                @foreach ($trashKar as $kar)
                                <?php $no++; ?>
                                <tr>
                                    <td> {{$no}}</td>
                                    <td> {{$kar->nik}}</td>
                                    <td> {{$kar->name}}</td>
                                    <td> {{$kar->birthday}}</td>
                                    <td> {{$kar->gender}}</td>
                                    <td> {{$kar->agama}}</td>
                                    <td> {{$kar->status}}</td>
                                    {{-- <td> {{$kar->masaKerja}}</td> --}}
                                    <td> {{$kar->gaji}}</td>

                                    <td>
                                        <a href="{{route('karyawan.restore', $kar->id)}}"
                                            class="btn btn-success">Restore</a>
                                    </td>
                                    <td>
                                        <a href="{{route('karyawan.deleted', $kar->id)}}"
                                            class="btn btn-danger">Deleted</a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{route('karyawan.index')}}" class="btn btn-secondary float-right">Kembali</a>
                    </div>
                </div>
                {{-- end Table --}}
            </div>
        </div>
    </div>
</main>
@endsection
