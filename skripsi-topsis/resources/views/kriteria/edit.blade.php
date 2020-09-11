@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Kriteria</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Kriteria</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <!-- Page Heading -->
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

                                @foreach ($kriteria as $kr)
                                <form action="{{route('kriteria.update', $kr->id)}}" method="POST">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $kr->id }}">
                                    {{-- Form Nama --}}
                                    <div class="form-group">
                                        <label for="name">Nama Kriteria</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukan Nama" id="name" name="name" value="{{$kr->name}}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Form Bobot --}}
                                    <div class="form-group">
                                        <label for="w">Bobot Kriteria</label>
                                        <input type="text" class="form-control @error('w') is-invalid @enderror"
                                            placeholder="Masukan Nama" id="w" name="w" value="{{$kr->w}}">
                                        @error('w')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group float-right">
                                        <div class="footer">
                                            <a href="{{route('kriteria.index')}}" class="btn btn-secondary">Close</a>
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
    </div>
</main>
@endsection
