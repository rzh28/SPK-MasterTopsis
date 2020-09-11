@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Data Karyawan</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Data Karyawan</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="container">
        <!-- Page Heading -->
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <!-- Form Edit -->

                                @foreach ($karyawan as $kar)
                                <form action="{{route('karyawan.update', $kar->id)}}" method="POST">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $kar->id }}">
                                    {{-- Start Form --}}
                                    <div class="form-group">
                                        <label for="name">Nomer Induk kar</label>
                                        <input type="text" class="form-control" value="{{ $kar->nik }}"
                                            placeholder="Masukan Nama" id="nik" name="nik" required>
                                    </div>

                                    {{-- Form kar --}}
                                    <div class="form-group">
                                        <label for="name">Nama kar</label>
                                        <input type="text" class="form-control" value="{{ $kar->name }}"
                                            placeholder="Masukan Nama" id="name" name="name">
                                    </div>

                                    {{-- Form Birhday --}}
                                    <div class="form-group">
                                        <label for="birthday">Tanggal Lahir</label>
                                        <input type="date" class="form-control" value="{{ $kar->birthday }}"
                                            placeholder="MM-DD-YEAR" id="birthday" name="birthday">
                                    </div>

                                    {{-- Form Gender --}}
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select class="form-control" value="{{ $kar->gender }}" name="gender">
                                            <option value="L" @if($kar->gender=='L') selected='selected' @endif
                                                >Laki -Laki</option>
                                            <option value="P" @if($kar->gender=='P') selected='selected' @endif
                                                >Perumpuan</option>
                                        </select>
                                    </div>

                                    {{-- form Agama --}}
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" name="agama" value="{{$kar->agama}}">
                                            <option value="Islam" @if($kar->agama=='Islam')
                                                selected='selected' @endif>Islam</option>
                                            <option value="Kristen" @if($kar->agama=='Kristen')
                                                selected='selected' @endif>Kristen</option>
                                            <option value="Katolik" @if($kar->agama=='Katolik')
                                                selected='selected' @endif>Katolik</option>
                                            <option value="Hindu" @if($kar->agama=='Hindu')
                                                selected='selected'@endif>Hindu</option>
                                            <option value="Budha" @if($kar->agama=='Budha')
                                                selected='selected'@endif>Budha</option>
                                        </select>
                                    </div>

                                    {{-- form Status --}}
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" value="{{$kar->status}}">
                                            <option value="Bekerja" @if($kar->status=='Bekerja')
                                                selected='selected' @endif
                                                >Bekerja</option>
                                            <option value="TidakBekerja" @if($kar->status=='TidakBekerja')
                                                selected='selected' @endif
                                                >Tidak Bekerja</option>
                                        </select>
                                    </div>


                                    {{-- form Masa Kerja --}}
                                    {{-- <div class="form-group">
                                        <label for="masaKerja">Masa Kerja</label>
                                        <input type="text" class="form-control" value="{{ $kar->masaKerja }}"
                                    placeholder="Masukan Nama" id="masaKerja" name="masaKerja">
                            </div> --}}

                            {{-- form Gaji --}}
                            <div class="form-group">
                                <label for="gaji">Gaji Pokok</label>
                                <input type="text" class="form-control" value="{{ $kar->gaji }}"
                                    placeholder="Masukan Gaji" id="gaji" name="gaji">
                            </div>

                            {{-- Form Masuk Kerja --}}
                            <div class="form-group">
                                <label for="masuk">Masuk Kerja</label>
                                <input type="date" class="form-control" value="{{ $kar->masuk }}"
                                    placeholder="MM-DD-YEAR" id="masuk" name="masuk">
                            </div>

                            {{-- end Form --}}
                            <div class="form-group float-right">
                                <div class="footer">
                                    <a href="{{route('karyawan.index')}}" class="btn btn-secondary">Close</a>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>

                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
