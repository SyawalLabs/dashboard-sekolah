@extends('layouts.app')
@section('title', 'Data Guru')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">

            <div class="row">
                <div class="col-12">
                    <div class="card stretch stretch-full">

                        {{-- Header --}}
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Data Guru</h5>
                            <a href="{{ route('guru.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i> Tambah Guru
                            </a>
                        </div>

                        {{-- Body --}}
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th width="150">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($guru as $index => $gr)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $gr->nip }}</td>
                                                <td>{{ $gr->nama }}</td>
                                                <td>
                                                    {{ $gr->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </td>
                                                <td>
                                                    @if ($gr->status == 'aktif')
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-secondary">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">

                                                        {{-- Detail --}}
                                                        <a href="{{ route('guru.show', $gr->id) }}"
                                                            class="btn btn-sm btn-info" title="Detail">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- Edit --}}
                                                        <a href="{{ route('guru.edit', $gr->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        {{-- Delete --}}
                                                        <form action="{{ route('guru.destroy', $gr->id) }}" method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                                <td colspan="6" class="text-center">Tidak ada data guru.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
