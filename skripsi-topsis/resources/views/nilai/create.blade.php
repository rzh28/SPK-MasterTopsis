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
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body table-responsive mx-auto">
                                <div class="align-content-center ">
                                    {{-- Table --}}
                                    <div class="table-wrapper">
                                        {{-- Table --}}
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                            data-target="#exampleModalCenter" style="float: right;" id="#">
                                            Import Nilai
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                {{-- start Form --}}
                                                <form action="{{route('nilai.import_excel')}}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Import
                                                                Excel
                                                                Nilai
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                        <div class="status">
                                            @if (session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                        </div>

                                        <table class="fl-table table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Karyawans_id</th>
                                                    <th>Kriterias_id</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            <tbody>
                                                </thead>
                                                <?php $no=0; ?>
                                                @foreach ($dataNilai as $n)
                                                <?php $no++; ?>

                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$n->karyawans_id}}</td>
                                                    <td>{{$n->kriterias_id}}</td>
                                                    <td>{{$n->nilai}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <a href="{{route('nilai.index')}}" class="btn btn-warning" style="float: right">
                                            kembali</a>
                                        <div class="linked" style="float: left">{{ $dataNilai->links() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
