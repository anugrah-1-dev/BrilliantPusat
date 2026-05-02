@extends('adminlte::page')

@section('title', 'Detail Galeri Erfan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-images mr-2 text-warning"></i> {{ $gallery->title }}</h1>
        <div>
            <a href="{{ route('admin.galleries-erfan.edit', $gallery->id) }}" class="btn btn-info">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.galleries-erfan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-outline card-warning">
        <div class="card-body">
            <p><strong>Deskripsi:</strong> {{ $gallery->description ?? '-' }}</p>
            <p><strong>Status:</strong>
                @if ($gallery->status)
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-secondary">Nonaktif</span>
                @endif
            </p>
            <hr>
            <div class="row">
                @forelse ($gallery->images as $image)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm">
                            @if ($image->type === 'video')
                                <div class="bg-dark d-flex align-items-center justify-content-center"
                                    style="height:160px;">
                                    <div class="text-center text-white p-2">
                                        <i class="fab fa-youtube fa-3x text-danger mb-1"></i>
                                        <p class="mb-0" style="font-size:11px; word-break:break-all;">
                                            {{ Str::limit($image->video_url, 50) }}</p>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    class="card-img-top" style="height:160px; object-fit:cover;" alt="Foto">
                            @endif
                            <div class="card-body p-2 text-center">
                                <span class="badge {{ $image->type === 'video' ? 'badge-danger' : 'badge-info' }}">
                                    {{ $image->type === 'video' ? 'Video' : 'Foto' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">Belum ada media.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@stop
