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
                                <span class="fs-12 text-muted">Sistem Informasi Manajemen Sekolah</span>
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

            <!-- [Billable Time] start -->
            <div class="col-xxl-6">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Grafik Jumlah Siswa per Kelas</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                        data-bs-toggle="remove"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                        data-bs-toggle="refresh"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                        data-bs-toggle="expand"> </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                    data-bs-offset="25, 25">
                                    <div data-bs-toggle="tooltip" title="Options">
                                        <i class="feather-more-vertical"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-at-sign"></i>New</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-calendar"></i>Event</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-bell"></i>Snoozed</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-trash-2"></i>Deleted</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-settings"></i>Settings</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-life-buoy"></i>Tips & Tricks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action">
                        <div id="billable-time-bar-chart"></div>
                    </div>
                </div>
            </div>
            <!-- [Billable Time] end -->

        </div>

    </main>

@endsection
