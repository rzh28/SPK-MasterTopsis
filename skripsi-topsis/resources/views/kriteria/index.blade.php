@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Kriteria</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Kriteria</li>
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

                                    {{-- Start Modal --}}
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                        data-target="#exampleModalCenter" style="float: right;" id="#">
                                        Tambah Kriteria
                                    </button>
                                    <!-- Modal -->
                                    <form action="{{route('kriteria.store')}}" method="POST">
                                        @csrf

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Data Karyawan
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- Start Form --}}

                                                        {{-- Form NIK --}}
                                                        <div class="form-group">
                                                            <label for="name">Nama Kriteria</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="Masukan Nama" id="name" name="name">
                                                            @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        {{-- Form Nama --}}
                                                        <div class="form-group">
                                                            <label for="w">Bobot Kriteria</label>
                                                            <input type="text"
                                                                class="form-control @error('w') is-invalid @enderror"
                                                                placeholder="Masukan Nama" id="w" name="w">
                                                            @error('w')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        {{-- end Form --}}
                                                        <div class="form-group">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- End Modal --}}

                                    {{-- Season Status --}}
                                    <div class="status">
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        @endif
                                    </div>

                                    <table class="fl-table table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kriteria</th>
                                                <th>Bobot (Weight)</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                            </tr>
                                        <tbody>
                                            </thead>
                                            <?php $no=0; ?>
                                            @foreach ($kriteria as $kr)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td> {{$kr->name}}</td>
                                                <td> {{$kr->w}}</td>

                                                <td><a href="{{route('kriteria.edit', $kr->id)}}"
                                                        class="btn btn-sm btn-success">Edit</a></td>

                                                <form action="{{route('kriteria.destroy', $kr->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td>
                                                        <button
                                                            onclick="return confirm('Yakin Anda Ingin Menghapusnya?');"
                                                            class="btn btn-sm btn-danger" type="submit"
                                                            id="hapus">Hapus</button>
                                                    </td>
                                                </form>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- end Table --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
