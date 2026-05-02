@extends('adminlte::page')

@section('title', 'Galeri Erfan')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1><i class="fas fa-images mr-2 text-warning"></i> Galeri Erfan</h1>
    <a href="{{ route('admin.galleries-erfan.create') }}" class="btn btn-warning">
        <i class="fas fa-plus"></i> Tambah Galeri Erfan
    </a>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Daftar Galeri Erfan</h3>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="icon fas fa-check mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th>Media</th>
                                    <th>Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($galleries as $index => $gallery)
                                    <tr>
                                        <td class="text-center">{{ $index + $galleries->firstItem() }}</td>
                                        <td>{{ $gallery->title }}</td>
                                        <td class="text-center">{{ $gallery->images_count }} media</td>
                                        <td class="text-center">
                                            @if ($gallery->status)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-secondary">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.galleries-erfan.show', $gallery->id) }}"
                                                    class="btn btn-primary" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.galleries-erfan.edit', $gallery->id) }}"
                                                    class="btn btn-info" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.galleries-erfan.destroy', $gallery->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="fas fa-images mr-2"></i> Belum ada data galeri Erfan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $galleries->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
