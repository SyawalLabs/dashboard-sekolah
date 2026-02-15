@extends('layouts.app')
@section('title', 'Data Kelas')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">

            <div class="row">
                <div class="col-12">
                    <div class="card stretch stretch-full">

                        {{-- Header --}}
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data Kelas</h5>
                            <a href="{{ route('kelas.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i> Tambah Kelas
                            </a>
                        </div>

                        {{-- Body --}}
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th width="150">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kelas as $index => $kl)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $kl->nama_kelas }}</td>
                                                <td>{{ $kl->wali_kelas }}</td>
                                                <td>{{ $kl->jumlah_siswa }}</td>
                                                <td>
                                                    <div class="d-flex gap-1">

                                                        {{-- Detail --}}
                                                        <a href="{{ route('kelas.show', $kl->id) }}"
                                                            class="btn btn-sm btn-info" title="Detail">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- Edit --}}
                                                        <a href="{{ route('kelas.edit', $kl->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        {{-- Delete --}}
                                                        <form action="{{ route('kelas.destroy', $kl->id) }}" method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Hapus">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data kelas.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Footer (Optional Pagination) --}}
                        <div class="card-footer">
                            {{-- {{ $siswa->links() }} --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
