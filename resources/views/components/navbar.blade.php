<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="b-brand">
                <h3>{{ config('app.name') }}</h3>
            </a>
        </div>

        <nav class="nxl-navigation">
            <div class="navbar-wrapper">
                <div class="m-header">
                    <a href="dashboard.html" class="b-brand">
                        <h3>SIM SMP</h3>
                    </a>
                </div>

                <div class="navbar-content">
                    <ul class="nxl-navbar">

                        <!-- ================= DASHBOARD ================= -->
                        <li class="nxl-item nxl-caption">
                            <label>Dashboard</label>
                        </li>

                        <li class="nxl-item">
                            <a href="{{ route('dashboard') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-home"></i></span>
                                <span class="nxl-mtext">Dashboard Utama</span>
                            </a>
                        </li>



                        <!-- ================= DATA MASTER ================= -->
                        <li class="nxl-item nxl-caption">
                            <label>Data Master</label>
                        </li>

                        <li class="nxl-item">
                            <a href="{{ route('siswa.index') }}" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-users"></i></span>
                                <span class="nxl-mtext">Siswa</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="guru.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-user"></i></span>
                                <span class="nxl-mtext">Guru</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="kelas.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-grid"></i></span>
                                <span class="nxl-mtext">Kelas</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="mapel.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-book"></i></span>
                                <span class="nxl-mtext">Mata Pelajaran</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="tahun-ajaran.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-calendar"></i></span>
                                <span class="nxl-mtext">Tahun Ajaran</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="semester.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-layers"></i></span>
                                <span class="nxl-mtext">Semester</span>
                            </a>
                        </li>


                        <!-- ================= AKADEMIK ================= -->
                        <li class="nxl-item nxl-caption">
                            <label>Akademik</label>
                        </li>

                        <li class="nxl-item">
                            <a href="jadwal.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-clock"></i></span>
                                <span class="nxl-mtext">Jadwal</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="absensi.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-check-square"></i></span>
                                <span class="nxl-mtext">Absensi</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="nilai.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-edit"></i></span>
                                <span class="nxl-mtext">Nilai</span>
                            </a>
                        </li>


                        <!-- ================= SISTEM ================= -->
                        <li class="nxl-item nxl-caption">
                            <label>Sistem</label>
                        </li>

                        <li class="nxl-item">
                            <a href="users.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-shield"></i></span>
                                <span class="nxl-mtext">Manajemen User</span>
                            </a>
                        </li>

                        <li class="nxl-item">
                            <a href="settings.html" class="nxl-link">
                                <span class="nxl-micon"><i class="feather-settings"></i></span>
                                <span class="nxl-mtext">Pengaturan</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

    </div>
</nav>
