{{-- Disini Memuat Isi Halaman Login --}}
@extends('layouts.auth')

@section('title')
<title>Login</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-bod">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <!-- $errors->has('email') AKAN MENGECEK JIKA ADA ERROR DARI HASIL VALIDASI LARAVEL, SEMUA KEGAGALAN
                                    VALIDASI LARAVEL AKAN DISIMPAN KEDALAM VARIABLE $errors -->
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text"
                                    name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus
                                    required>
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="row">
                                @if (session('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                                @endif

                                <div class="col-6">
                                    <button class="btn btn-primary px-4">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center p-5">
                            <img class="navbar-brand-full"
                                src="https://www.warungdata.com/wp-content/uploads/revslider/slidewd1/wd-logo.png"
                                width="100%" height="100%" alt="SPK-TOPSIS">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
