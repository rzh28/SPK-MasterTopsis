@extends('layouts.admin')
<!-- Tidak perlu memakai blade.php lagi-->

@section('title')
<title>Hasil Topsis</title> <!-- Ini merupakan halaman admin ketika sudah login -->
@endsection

@section('content')

@inject('nilai','App\Http\Controllers\HasilTopsisController')

<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Hasil Topsis</li>
    </ol>
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
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Hasil Topsis</li>
                                        <li class="breadcrumb-item active">Normalisasi</li>
                                    </ol>
                                    <form action="{{route('bobot.store')}}" method="POST">
                                        @csrf
                                        <table class="fl-table table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIK</th>
                                                    <th>Nama Karyawan</th>
                                                    @foreach ($dataKri as $kri )
                                                    <th>{{$kri->name}}</th>
                                                    @endforeach
                                                </tr>
                                            <tbody>
                                                </thead>
                                                <?php $no=0; ?>
                                                @foreach ($dataKarN as $kar)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$kar->nik}}</td>
                                                    <td style="text-align: left">{{$kar->name}}</td>
                                                    @foreach ($nilai->nilaiNormalisasi($kar->id) as $nlkar)
                                                    <td style="text-align: center">{{round($nlkar->nilai,5)}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary" style="float: right;">Proses
                                            Matrix Bobot</button>
                                    </form>
                                </div>
                                {{-- end Table --}}

                                <div class="table-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Hasil Topsis</li>
                                        <li class="breadcrumb-item active">Bobot</li>
                                    </ol>
                                    <form action="{{route('jarak.store')}}" method="POST">
                                        @csrf
                                        <table class="fl-table table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIK</th>
                                                    <th>Nama Karyawan</th>
                                                    @foreach ($dataKri as $kri )
                                                    <th>{{$kri->name}}</th>
                                                    @endforeach
                                                </tr>
                                            <tbody>
                                                </thead>
                                                <?php $no=0; ?>
                                                @foreach ($dataKarW as $kar)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$kar->nik}}</td>
                                                    <td style="text-align: left">{{$kar->name}}</td>
                                                    @foreach ($nilai->nilaiBobot($kar->id) as $nlkar)
                                                    <td style="text-align: center">{{round($nlkar->nilai,5)}}</td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary" style="float: right;">Proses
                                            Matrix Jarak</button>
                                    </form>
                                </div>
                                {{-- end Table --}}
                                {{--
                                <div class="table-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Hasil Topsis</li>
                                        <li class="breadcrumb-item active">Ideal</li>
                                    </ol>
                                    <table class="fl-table table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nilai Ideal</th>
                                                @foreach ($dataKri as $kri )
                                                <th>{{$kri->name}}</th>
                                @endforeach
                                </tr>
                                <tbody>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>Positif (+)</td>
                                        @foreach ($dataKri as $kri)
                                        {{$kri->id}}
                                        @foreach ($nilai->idealMax($kri->id) as $nilMax)
                                        <td>{{$nilMax->nilai}}</td>
                                        @endforeach
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Negatif (-)</td>
                                        @foreach ($nilai->idealMin($kri->id) as $nilMin)
                                        {{$kri->id}}
                                        @foreach($nilai->idealMin($kri->id) as $nilMin )
                                        {{$nilMin->nilai}}
                                        @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                                </table>
                            </div> --}}
                            {{-- end Table --}}

                            <div class="table-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Hasil Topsis</li>
                                    <li class="breadcrumb-item active">Jarak</li>
                                </ol>
                                <form action="{{route('preferesnsi.store')}}" method="POST">
                                    @csrf
                                    <table class="fl-table table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIK</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jarak Positif (+)</th>
                                                <th>Jarak Negatif (-)</th>
                                            </tr>
                                        <tbody>
                                            </thead>
                                            <?php $no=0; ?>
                                            @foreach ($dataKarJ as $kar)
                                            <?php $no++ ?>
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$kar->nik}}</td>
                                                <td style="text-align: left">{{$kar->name}}</td>
                                                @foreach ($nilai->nilaiJarak($kar->id) as $nlkar)
                                                <td>{{round($nlkar->nilai_max,5)}}</td>
                                                <td>{{round($nlkar->nilai_min,5)}}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary" style="float: right;">Proses
                                        Matrix Preferensi</button>
                                </form>
                            </div>
                            {{-- end Table --}}

                            <div class="table-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Hasil Topsis</li>
                                    <li class="breadcrumb-item active">Preferensi</li>
                                </ol>
                                <form action="{{route('hasil_bonus.store')}}" method="POST">
                                    @csrf
                                    <table class="fl-table table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIK</th>
                                                <th>Nama Karyawan</th>
                                                <th>Hasil Preferensi</th>
                                            </tr>
                                        <tbody>
                                            </thead>
                                            <?php $no=0; ?>
                                            @foreach ($dataKarP as $kar)
                                            <?php $no++ ?>
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$kar->nik}}</td>
                                                <td style="text-align: left">{{$kar->name}}</td>
                                                @foreach ($nilai->nilaiPreferensi($kar->id) as $nlkar)
                                                <td>{{round ($nlkar->nilai,5)}}</td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary" style="float: right;">Proses
                                        Bonus Karyawan</button>
                                </form>
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
