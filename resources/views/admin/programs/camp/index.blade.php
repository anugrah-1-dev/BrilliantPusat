@extends('adminlte::page')

@section('title', 'Manajemen Program Camp')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Daftar Program Camp</h1>
        <x-adminlte-button label="Tambah Program" theme="primary" icon="fas fa-plus" data-toggle="modal" data-target="#createProgramModal" />
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card theme="lightblue" theme-mode="outline" title="List Program Camp">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama program...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="programTable">
                        <thead class="bg-lightblue text-center">
    <tr>
        <th>No</th>
        <th>Thumbnail</th>
        <th>Nama</th>
        <th>Slug</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga / Hari</th>
        <th>Harga 1 Minggu</th>
        <th>Harga 2 Minggu</th>
        <th>Harga 3 Minggu</th>
        <th>Harga 1 Bulan</th>
        <th>Harga 2 Bulan</th>
        <th>Harga 3 Bulan</th>
        <th>Harga 6 Bulan</th>
        <th>Harga 1 Tahun</th>
        <th>Fasilitas</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse($programs as $index => $program)
    <tr class="text-center">
        <td>{{ $index + 1 }}</td>
        <td>
            @if($program->thumbnail && file_exists(public_path('asset/upload/camp/' . $program->thumbnail)))
                <img src="{{ asset('asset/upload/camp/' . $program->thumbnail) }}" alt="Thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
            @else
                <span class="text-muted">-</span>
            @endif
        </td>
        <td class="text-left"><strong>{{ $program->nama }}</strong></td>
        <td>{{ $program->slug ?? '-' }}</td>
        <td>{{ $program->kategori ?? '-' }}</td>
        <td>{{ $program->stok ?? 0 }}</td>
        <td>Rp {{ number_format($program->harga_perhari, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_satu_minggu, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_dua_minggu, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_tiga_minggu, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_satu_bulan, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_dua_bulan, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_tiga_bulan, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_enam_bulan, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($program->harga_satu_tahun, 0, ',', '.') }}</td>
        <td class="text-left">{!! nl2br(e($program->fasilitas)) !!}</td>
        <td>
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-warning btn-sm mr-1 btn-edit-program"
    data-id="{{ $program->id }}"
    data-nama="{{ $program->nama }}"
    data-slug="{{ $program->slug }}"
    data-kategori="{{ $program->kategori }}"
    data-stok="{{ $program->stok }}"
    data-harga_perhari="{{ $program->harga_perhari }}"
    data-harga_satu_minggu="{{ $program->harga_satu_minggu }}"
    data-harga_dua_minggu="{{ $program->harga_dua_minggu }}"
    data-harga_tiga_minggu="{{ $program->harga_tiga_minggu }}"
    data-harga_satu_bulan="{{ $program->harga_satu_bulan }}"
    data-harga_dua_bulan="{{ $program->harga_dua_bulan }}"
    data-harga_tiga_bulan="{{ $program->harga_tiga_bulan }}"
    data-harga_enam_bulan="{{ $program->harga_enam_bulan }}"
    data-harga_satu_tahun="{{ $program->harga_satu_tahun }}"
    data-fasilitas="{{ $program->fasilitas }}">

                    <i class="fas fa-edit"></i>
                </button>
                <form action="{{ route('admin.programs.camp.destroy', $program->id) }}" method="POST" onsubmit="confirmDelete(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="17" class="text-center">Tidak ada data program camp.</td>
    </tr>
    @endforelse
</tbody>

                    </table>
                </div>
            </x-adminlte-card>
        </div>
    </div>

    {{-- Modal Create --}}
    <x-adminlte-modal id="createProgramModal" title="Tambah Program Camp Baru" theme="lightblue" size="lg" static-backdrop>
        <form action="{{ route('admin.programs.camp.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="nama" label="Nama Program" placeholder="Contoh: Camp Satu" required />
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="slug" label="Slug (URL)" placeholder="contoh-camp-satu" />
        </div>
        <div class="col-md-4">
            <x-adminlte-input name="kategori" label="Kategori" placeholder="Contoh: Edukasi" />
        </div>
        <div class="col-md-4">
            <x-adminlte-input name="stok" label="Stok" type="number" placeholder="Contoh: 20" />
        </div>
        <div class="col-md-4">
            <x-adminlte-input name="harga_perhari" label="Harga / Hari" type="number" placeholder="Contoh: 100000" />
        </div>

        @php
            $durasi = ['satu_minggu', 'dua_minggu', 'tiga_minggu', 'satu_bulan', 'dua_bulan', 'tiga_bulan', 'enam_bulan', 'satu_tahun'];
        @endphp
        @foreach($durasi as $d)
            <div class="col-md-4">
                <x-adminlte-input name="harga_{{ $d }}" label="Harga {{ str_replace('_', ' ', ucfirst($d)) }}" type="number" />
            </div>
        @endforeach

        <div class="col-md-12">
            <x-adminlte-textarea name="fasilitas" label="Fasilitas" rows=4 placeholder="Contoh: Makan 3x, WiFi, Modul,..." />
        </div>
        <div class="col-md-12">
            <x-adminlte-input-file name="thumbnail" label="Thumbnail Program (gambar)" />
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3 w-100">
        <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    </div>
</form>

        <x-slot name="footerSlot">
            <style>#createProgramModal .modal-footer { display: none; }</style>
        </x-slot>
    </x-adminlte-modal>

    {{-- Modal Edit --}}
    <x-adminlte-modal id="editProgramModal" title="Edit Program Camp" theme="lightblue" size="lg" static-backdrop>
        <form id="editProgramForm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="editId">
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input name="nama" label="Nama Program" id="editNama" required />
        </div>
        <div class="col-md-6">
            <x-adminlte-input name="slug" label="Slug (URL)" id="editSlug" />
        </div>
        <div class="col-md-4">
            <x-adminlte-input name="kategori" label="Kategori" id="editKategori" />
        </div>
        <div class="col-md-4">
            <x-adminlte-input name="stok" label="Stok" id="editStok" type="number" />
        </div>
        <div class="col-md-4">
            <x-adminlte-input name="harga_perhari" label="Harga / Hari" id="editHargaPerhari" type="number" />
        </div>

        @foreach($durasi as $d)
            <div class="col-md-4">
                <x-adminlte-input name="harga_{{ $d }}" label="Harga {{ str_replace('_', ' ', ucfirst($d)) }}" id="editHarga_{{ $d }}" type="number" />
            </div>
        @endforeach

        <div class="col-md-12">
            <x-adminlte-textarea name="fasilitas" label="Fasilitas" id="editFasilitas" rows=4 />
        </div>
        <div class="col-md-12">
            <x-adminlte-input-file name="thumbnail" label="Thumbnail (biarkan kosong jika tidak diganti)" />
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3 w-100">
        <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
    </div>
</form>

        <x-slot name="footerSlot">
            <style>#editProgramModal .modal-footer { display: none; }</style>
        </x-slot>
    </x-adminlte-modal>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event) {
    event.preventDefault();
    const form = event.target.closest('form');
    
    Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        text: "Data akan dihapus secara permanen dari database.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f', // Merah
        cancelButtonColor: '#6c757d',  // Abu
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // Hapus data dari database
        } else {
            Swal.fire({
                title: 'Dibatalkan',
                text: 'Data tidak jadi dihapus.',
                icon: 'info',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
}


    $(document).ready(function () {
        // Fitur pencarian
        $('#searchInput').on('keyup', function () {
            const searchValue = $(this).val().toLowerCase();
            $('#programTable tbody tr').each(function () {
                const rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(searchValue));
            });
        });

        // Tombol edit
        $('.btn-edit-program').on('click', function () {
            const data = $(this).data();

            $('#editId').val(data.id);
            $('#editNama').val(data.nama);
            $('#editSlug').val(data.slug);
            $('#editKategori').val(data.kategori);
            $('#editStok').val(data.stok);
            $('#editHargaPerhari').val(data.harga_perhari);
            $('#editFasilitas').val(data.fasilitas);

            // Set semua harga durasi
            const durasi = [
                'satu_minggu', 'dua_minggu', 'tiga_minggu',
                'satu_bulan', 'dua_bulan', 'tiga_bulan',
                'enam_bulan', 'satu_tahun'
            ];
            durasi.forEach(d => {
                $('#editHarga_' + d).val(data['harga_' + d]);
            });

            // Perbaikan utama: action form update
            const actionUrl = `{{ url('admin/programs/camp') }}/${data.id}`;
            $('#editProgramForm').attr('action', actionUrl);

            // Tampilkan modal
            $('#editProgramModal').modal('show');
        });
    });
</script>

@if(session('alert'))
<script>
    Swal.fire(@json(session('alert')));
</script>
@endif
@endsection
