{{-- Memanggil Template Layouts File Admin --}}

@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Dashboard</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">

                            <div class="text-center">
                                <p>
                                    <h1> SPK - TOPSIS</h1>
                                </p>
                            </div>
                            <hr>
                            <div class="text-justify">
                                <p>
                                    <h5> Selamat Datang Di Website SPK - Bonus Akhir Tahun </h5>
                                </p>
                            </div>
                            <div class="text-justify">
                                <p>Web sederhana ini dapat digunakan untuk manajemen pemberian bonus akhir tahun sebagai
                                    kriteria yaitu :
                                    <p>1. Kehadiran</p>
                                    <p>2. Disiplin</p>
                                    <p>3. Tanggung Jawab</p>
                                    <p>4. Loyalitas</p>
                                    <p>5. Kreativitas</p>
                                    <p>6. Kerjasama</p>
                                    Aplikasi ini mengimplementasikan pemrograman Web dengan HTML, CSS, PHP, dan
                                    JavaScript dikolaborasikan dengan metode TOPSIS serta database MySQL dan framework
                                    Laravel versi 6.*. Dibuat untuk memenuhi tugas akhir Sistem Penunjang Keputusan di
                                    PT Warung Data Indonesia.
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <hr>
                                        <p><B>UNIVERSITAS KRISNADWIPAYANA 2020</B></p>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
