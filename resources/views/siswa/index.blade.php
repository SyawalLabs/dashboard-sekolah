@extends('layouts.app')
@section('title', 'Data Siswa')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Data Siswa</h4>
                            <button class="btn btn-primary btn-sm" onclick="openAddModal()">
                                <i class="bi bi-plus-circle"></i> Tambah
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data"
                                    class="d-flex gap-2">
                                    @csrf
                                    <input type="file" name="file" class="form-control form-control-sm"
                                        accept=".xlsx,.xls" required>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="bi bi-upload"></i> Import
                                    </button>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Kelamin</th>
                                            <th>Status</th>
                                            <th style="width: 120px;" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($siswa as $i => $s)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $s->nis }}</td>
                                                <td>{{ $s->nama }}</td>
                                                <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                                                <td>{{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                <td>
                                                    @if ($s->status == 'aktif')
                                                        <span class="badge bg-success">Aktif</span>
                                                    @elseif($s->status == 'lulus')
                                                        <span class="badge bg-info">Lulus</span>
                                                    @else
                                                        <span class="badge bg-secondary">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-info"
                                                        onclick="viewSiswa({{ $s->id }})" title="Lihat">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-warning"
                                                        onclick="editSiswa({{ $s->id }})" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="deleteSiswa({{ $s->id }})" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">Tidak ada data</td>
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



    <!-- Modal Tambah -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formAdd">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">NIS <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nis">
                            <small class="text-danger d-block" id="err_nis"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" name="nisn">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama">
                            <small class="text-danger d-block" id="err_nama"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas <span class="text-danger">*</span></label>
                            <select class="form-select" name="kelas_id">
                                <option value="">-- Pilih --</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger d-block" id="err_kelas_id"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select" name="jenis_kelamin">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <small class="text-danger d-block" id="err_jenis_kelamin"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tempat_tanggal_lahir"
                                placeholder="Jakarta, 15 Januari 2000">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" name="status">
                                <option value="">-- Pilih --</option>
                                @foreach ($statuses as $st)
                                    <option value="{{ $st->key }}">{{ ucfirst($st->key) }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger d-block" id="err_status"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="saveAdd()">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEdit">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label class="form-label">NIS <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nis">
                            <small class="text-danger d-block" id="err_edit_nis"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" name="nisn">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama">
                            <small class="text-danger d-block" id="err_edit_nama"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas <span class="text-danger">*</span></label>
                            <select class="form-select" name="kelas_id">
                                <option value="">-- Pilih --</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger d-block" id="err_edit_kelas_id"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select" name="jenis_kelamin">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <small class="text-danger d-block" id="err_edit_jenis_kelamin"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tempat_tanggal_lahir">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" name="status">
                                <option value="">-- Pilih --</option>
                                @foreach ($statuses as $st)
                                    <option value="{{ $st->key }}">{{ ucfirst($st->key) }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger d-block" id="err_edit_status"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="saveEdit()">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="detailContent"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const csrf = '{{ csrf_token() }}';

        function clearErr() {
            document.querySelectorAll('[id^="err_"]').forEach(e => e.textContent = '');
        }

        function openAddModal() {
            clearErr();
            document.getElementById('formAdd').reset();
            new bootstrap.Modal('#addModal').show();
        }

        function saveAdd() {
            clearErr();
            const fd = new FormData(document.getElementById('formAdd'));
            fetch('{{ route('siswa.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: fd
            }).then(r => r.json()).then(d => {
                if (d.success) {
                    Swal.fire('Berhasil!', d.message, 'success').then(() => location.reload());
                } else if (d.errors) {
                    Object.entries(d.errors).forEach(([k, v]) => {
                        const e = document.getElementById('err_' + k);
                        if (e) e.textContent = v[0];
                    });
                } else {
                    Swal.fire('Gagal!', d.message || 'Error', 'error');
                }
            }).catch(e => Swal.fire('Error!', e.message, 'error'));
        }

        function editSiswa(id) {
            fetch(`/siswa/${id}/edit`).then(r => r.json()).then(d => {
                const s = d.siswa;
                const f = document.getElementById('formEdit');
                document.getElementById('editId').value = id;
                f.nis.value = s.nis;
                f.nisn.value = s.nisn || '';
                f.nama.value = s.nama;
                f.kelas_id.value = s.kelas_id;
                f.jenis_kelamin.value = s.jenis_kelamin;
                f.tempat_tanggal_lahir.value = s.tempat_tanggal_lahir || '';
                f.alamat.value = s.alamat || '';
                f.status.value = s.status;
                clearErr();
                new bootstrap.Modal('#editModal').show();
            }).catch(e => Swal.fire('Error!', e.message, 'error'));
        }

        function saveEdit() {
            clearErr();
            const id = document.getElementById('editId').value;
            const fd = new FormData(document.getElementById('formEdit'));
            fd.append('_method', 'PUT');
            fetch(`/siswa/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: fd
            }).then(r => r.json()).then(d => {
                if (d.success) {
                    Swal.fire('Berhasil!', d.message, 'success').then(() => location.reload());
                } else if (d.errors) {
                    Object.entries(d.errors).forEach(([k, v]) => {
                        const e = document.getElementById('err_edit_' + k);
                        if (e) e.textContent = v[0];
                    });
                } else {
                    Swal.fire('Gagal!', d.message || 'Error', 'error');
                }
            }).catch(e => Swal.fire('Error!', e.message, 'error'));
        }

        function viewSiswa(id) {
            fetch(`/siswa/${id}`).then(r => r.json()).then(d => {
                const jk = d.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
                document.getElementById('detailContent').innerHTML = `
            <div class="row">
                <div class="col-6">
                    <p><b>NIS:</b> ${d.nis}</p>
                    <p><b>NISN:</b> ${d.nisn || '-'}</p>
                    <p><b>Nama:</b> ${d.nama}</p>
                    <p><b>Kelamin:</b> ${jk}</p>
                </div>
                <div class="col-6">
                    <p><b>Kelas ID:</b> ${d.kelas_id}</p>
                    <p><b>Status:</b> ${d.status}</p>
                    <p><b>TTL:</b> ${d.tempat_tanggal_lahir || '-'}</p>
                </div>
            </div>
            <p><b>Alamat:</b> ${d.alamat || '-'}</p>
        `;
                new bootstrap.Modal('#detailModal').show();
            }).catch(e => Swal.fire('Error!', e.message, 'error'));
        }

        function deleteSiswa(id) {
            Swal.fire({
                    title: 'Hapus?',
                    text: 'Data akan dihapus permanen',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545'
                })
                .then(r => {
                    if (r.isConfirmed) {
                        fetch(`/siswa/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrf,
                                    'Accept': 'application/json'
                                }
                            })
                            .then(res => res.json())
                            .then(d => {
                                if (d.success) {
                                    Swal.fire('Berhasil!', d.message, 'success').then(() => location.reload());
                                } else {
                                    Swal.fire('Gagal!', d.message || 'Error', 'error');
                                }
                            }).catch(e => Swal.fire('Error!', e.message, 'error'));
                    }
                });
        }
    </script>
@endsection
