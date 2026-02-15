@extends('layouts.app')
@section('title', 'Data Siswa')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">

            <div class="row">
                <div class="col-12">
                    <div class="card stretch stretch-full">

                        {{-- Header --}}
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data Siswa</h5>
                            <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus"></i> Tambah Siswa
                            </a>
                        </div>

                        {{-- Body --}}
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th width="150">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($siswa as $index => $sis)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $sis->nis }}</td>
                                                <td>{{ $sis->nama }}</td>
                                                <td>{{ $sis->kelas->nama_kelas ?? '-' }}</td>
                                                <td>
                                                    {{ $sis->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </td>
                                                <td>
                                                    @if ($sis->status == 'aktif')
                                                        <span class="badge bg-success">Aktif</span>
                                                    @elseif($sis->status == 'lulus')
                                                        <span class="badge bg-primary">Lulus</span>
                                                    @else
                                                        <span class="badge bg-secondary">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">

                                                        {{-- Detail --}}
                                                        <a href="{{ route('siswa.show', $sis->id) }}"
                                                            class="btn btn-sm btn-info" title="Detail">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- Edit --}}
                                                        <a href="{{ route('siswa.edit', $sis->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        {{-- Hapus --}}
                                                        <form action="{{ route('siswa.destroy', $sis->id) }}" method="POST"
                                                            onsubmit="return confirm('Yakin hapus siswa ini?')">
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
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    Data siswa belum tersedia
                                                </td>
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
