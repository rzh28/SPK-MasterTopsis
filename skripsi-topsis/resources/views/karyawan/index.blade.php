@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Data Karyawan</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

{{-- @dump() --}}

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
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                        data-target="#exampleModalCenter" style="float: right;" id="#">
                        Tambah Data Karyawan
                    </button>
                    <a href="{{route('karyawan.trash')}}" type="submit"
                        class="btn btn-secondary float-right mr-2">Trash</a>

                    <!-- Modal -->
                    <form action="{{route('karyawan.store')}}" method="POST">
                        @csrf

                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Data Karyawan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- Start Form --}}

                                        {{-- Form NIK --}}
                                        <div class="form-group">
                                            <label for="name">Nomer Induk Karyawan</label>
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                placeholder="Masukan Nama" id="nik" name="nik">
                                            @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Form Nama --}}
                                        <div class="form-group">
                                            <label for="name">Nama Karyawan</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukan Nama" id="name" name="name">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Form Birhday --}}
                                        <div class="form-group">
                                            <label for="birthday">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('birthday') is-invalid @enderror"
                                                placeholder="MM-DD-YEAR" id="birthday" name="birthday">
                                            @error('birthday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Form Gender --}}
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select class="form-control @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option value="">None</option>
                                                <option value="L">Laki - Laki</option>
                                                <option value="P"> Perumpuan</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Form Agama --}}
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select class="form-control @error('agama') is-invalid @enderror"
                                                name="agama">
                                                <option value="">None</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                            @error('agama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- form Status --}}
                                        <div class="form-group">
                                            <label for="status">Status Bekerja</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status">
                                                <option value="">None</option>
                                                <option value="Bekerja">Bekerja</option>
                                                <option value="TidakBekerja">Tidak Bekerja</option>
                                            </select>
                                            @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        {{-- form Masa Kerja --}}
                                        {{-- <div class="form-group">
                                            <label for="masaKerja">Masa Kerja</label>
                                            <input type="text"
                                                class="form-control @error('masaKerja') is-invalid @enderror"
                                                placeholder="Masukan Nama" id="masaKerja" name="masaKerja">
                                            @error('masaKerja')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                {{-- form Gaji --}}
                                <div class="form-group">
                                    <label for="gaji">Gaji Pokok</label>
                                    <input type="text" class="form-control @error('gaji') is-invalid @enderror"
                                        placeholder="Masukan Gaji" id="gaji" name="gaji">
                                    @error('gaji')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- form Masuk Kerja --}}
                                <div class="form-group">
                                    <label for="masuk">Masuk Kerja</label>
                                    <input type="date" class="form-control @error('masuk') is-invalid @enderror"
                                        placeholder="Masukan masuk" id="masuk" name="masuk">
                                    @error('masuk')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- end Form --}}
                            <div class="form-group">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>
            {{-- End Modal --}}

            {{-- <div class="table-wrapper"> --}}
            <div class="col-6">
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
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Status</th>
                        {{-- <th>Masa Kerja</th> --}}
                        <th>Gaji Pokok</th>
                        <th>Masuk Kerja</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                    </tr>
                <tbody>

                    </thead>
                    <?php $no=0; ?>
                    @foreach ($karyawan as $kar)
                    <?php $no++; ?>
                    <tr>
                        <td> {{$no}}</td>
                        <td> {{$kar->nik}}</td>
                        <td> {{$kar->name}}</td>
                        <td> {{$kar->birthday}}</td>
                        <td> {{$kar->gender}}</td>
                        <td> {{$kar->agama}}</td>
                        <td> {{$kar->status}}</td>
                        <td>Rp. {{number_format($kar->gaji,2)}}</td>
                        <td> {{$kar->masuk}}</td>

                        <td><a href="{{route('karyawan.edit', $kar->id)}}" class="btn btn-sm btn-success">Edit</a>
                        </td>
                        <form action="{{route('karyawan.destroy', $kar->id)}}" method="POST">
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
        </div>
    </div>
    {{-- end Table --}}
</main>
@endsection
