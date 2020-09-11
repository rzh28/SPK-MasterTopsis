@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Data Karyawan</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data Siswa</li>
    </ol>
    <!-- Page Heading -->
    <div class="data-table-container">
        <div class="card justify-content-center">
            <div class="card-header">
                <div class="card-body table-responsive mx-auto">

                    {{-- Table --}}
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                        data-target="#exampleModalCenter" style="float: right;" id="#">
                        Tambah Data Karyawan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            {{-- start Form --}}
                            <form action="{{route('siswa.import_excel')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Import Excel Data Karyawan
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for=""> Pilih File Excel</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>
                                        <div class="form-group">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- end Form --}}
                        </div>
                    </div>
                    {{-- End Modal --}}

                    {{-- <div class="table-wrapper"> --}}
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

                    <table class="fl-table table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        <tbody>

                            </thead>
                            <?php $no=0; ?>
                            @foreach ($siswa as $sis)
                            <?php $no++; ?>
                            <tr>
                                <td> {{$no}}</td>
                                <td> {{$sis->name}}</td>
                                <td> {{$sis->gender}}</td>
                                <td> {{$sis->status}}</td>

                                <td><a href="" class="btn btn-sm btn-success">Edit</a>
                                </td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <button onclick="return confirm('Yakin Anda Ingin Menghapusnya?');"
                                            class="btn btn-sm btn-danger" type="submit" id="hapus">Hapus</button>
                                    </td>
                                </form>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="linked" style="float: right">{{$siswa->links()}}</div>
                </div>
            </div>
        </div>
        {{-- end Table --}}
    </div>
</main>
@endsection
