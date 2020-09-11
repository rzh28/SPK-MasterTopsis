<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route ('home')}}">
                <i class="nav-icon icon-home"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('karyawan.index')}}">
                <i class="nav-icon icon-grid"></i> Data Karyawan
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route ('periode.index')}}">
        <i class="nav-icon fa fa-book"></i> Periode Bonus
        </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{route('kriteria.index')}}">
                <i class="nav-icon fa fa-barcode"></i> Kriteria Bonus
            </a>
        </li>

        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="javascript">
                <i class="nav-icon icon-cup"></i> Penilaian Karyawan
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('nilai.index')}}">
                        <i class="nav-icon icon-puzzle"></i> Nilai Master
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('nilai_insial.index')}}">
                        <i class="nav-icon icon-puzzle"></i> Nilai Inisialisasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('hasil_topsis.index')}}">
                        <i class="nav-icon icon-puzzle"></i> Hasil Topsis
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('hasil_bonus.index')}}">
                        <i class="nav-icon icon-puzzle"></i> Hasil Bonus
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
