@extends('layouts.app')
@section('title', 'Tambah Siswa')

@section('content')
<main class="nxl-container">
    <div class="nxl-content">

        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf

            <div class="row">
                {{-- KIRI --}}
                <div class="col-xl-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">

                            <div class="mb-4">
                                <label class="form-label">NIS <span class="text-danger">*</span></label>
                                <input type="text" name="nis" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">NISN <span class="text-danger">*</span></label>
                                <input type="text" name="nisn" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($genders as $g)
                                        <option value="{{ $g->key }}">{{ $g->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- KANAN --}}
                <div class="col-xl-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">

                            <div class="mb-4">
                                <label class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_tanggal_lahir"
                                       class="form-control"
                                       placeholder="Contoh: Jakarta, 12-05-2010"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" class="form-control" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    @foreach($statuses as $s)
                                        <option value="{{ $s->key }}">{{ $s->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather-save me-2"></i> Simpan
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</main>

{{-- JS tetap dipertahankan --}}
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        console.log("Form Tambah Siswa dikirim...");
    });
</script>
@endsection
