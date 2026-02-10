<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="b-brand">
                <h3>{{ config('app.name') }}</h3>
            </a>
        </div>

        <div class="navbar-content">
            <ul class="nxl-navbar">

                {{-- Caption --}}
                <li class="nxl-item nxl-caption">
                    <label>Menu Utama</label>
                </li>

                {{-- Dashboard --}}
                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- Manajemen Siswa --}}
                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-user"></i></span>
                        <span class="nxl-mtext">Manajemen Siswa</span>
                    </a>
                </li>

                {{-- Manajemen Guru --}}
                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-users"></i></span>
                        <span class="nxl-mtext">Manajemen Guru</span>
                    </a>
                </li>

                {{-- Manajemen Kelas --}}
                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layers"></i></span>
                        <span class="nxl-mtext">Manajemen Kelas</span>
                    </a>
                </li>

                {{-- Mata Pelajaran --}}
                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-book"></i></span>
                        <span class="nxl-mtext">Mata Pelajaran</span>
                    </a>
                </li>

                {{-- Nilai (Dropdown karena biasanya banyak fitur) --}}
                <li class="nxl-item nxl-hasmenu">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-edit"></i></span>
                        <span class="nxl-mtext">Nilai</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item"><a href="#" class="nxl-link">Input Nilai</a></li>
                        <li class="nxl-item"><a href="#" class="nxl-link">Rekap Nilai</a></li>
                    </ul>
                </li>

                {{-- Jadwal --}}
                <li class="nxl-item">
                    <a href="#" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-calendar"></i></span>
                        <span class="nxl-mtext">Jadwal</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
