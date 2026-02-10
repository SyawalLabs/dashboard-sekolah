@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">

            <!-- [Mini Card] start -->
            <div class="col-12 mt-2 mx-2">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="hstack justify-content-between mb-4 pb-">
                            <div>
                                <h2 class="mb-1">Dashboard {{ env('APP_NAME') }}</h2>
                                <span class="fs-12 text-muted">Sistem Informasi Manajemen Kriminal</span>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Total Siswa --}}
                            <div class="col-xxl-2 col-lg-3 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-mortarboard fs-3 text-primary"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">
                                            {{-- {{ $totalPetugas }} Personel --}}
                                        </div>
                                        <p class="fs-12 fw-medium text-muted mb-0">
                                            Total Siswa
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Total Guru --}}
                            <div class="col-xxl-2 col-lg-3 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-person-badge fs-3 text-success"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">
                                            {{-- {{ $totalKasus }} Kasus --}}
                                        </div>
                                        <p class="fs-12 fw-medium text-muted mb-0">
                                            Total Guru
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Total Kelas --}}
                            <div class="col-xxl-2 col-lg-3 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-building fs-3 text-warning"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">
                                            {{-- {{ $kasusBelumSelesai }} Kasus --}}
                                        </div>
                                        <p class="fs-12 fw-medium text-muted mb-0">
                                            Total Kelas
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Total Mata Pelajaran --}}
                            <div class="col-xxl-2 col-lg-3 col-md-6">
                                <div class="card stretch stretch-full border border-dashed border-gray-5">
                                    <div class="card-body rounded-3 text-center">
                                        <i class="bi bi-book fs-3 text-danger"></i>
                                        <div class="fs-4 fw-bolder text-dark mt-3 mb-1">
                                            {{-- {{ $kasusBelumSelesai }} Kasus --}}
                                        </div>
                                        <p class="fs-12 fw-medium text-muted mb-0">
                                            Total Mata Pelajaran
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [Mini Card] end -->



        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <p><span>By: <a target="_blank" href="https://wrapbootstrap.com/user/theme_ocean"
                        target="_blank">theme_ocean</a></span> • <span>Distributed by: <a target="_blank"
                        href="https://themewagon.com" target="_blank">ThemeWagon</a></span></p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->

        {{-- Script Grafik JS --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                var options = {
                    chart: {
                        type: 'line',
                        height: 250,
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: 'Kasus',
                    }],
                    xaxis: {},
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    markers: {
                        size: 4
                    },
                    colors: ['#dc3545'],
                    dataLabels: {
                        enabled: false
                    },
                    grid: {
                        strokeDashArray: 4
                    }
                };

                var chart = new ApexCharts(
                    document.querySelector("#bounce-rate"),
                    options
                );

                chart.render();
            });
        </script>

    </main>

@endsection
