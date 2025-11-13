@extends('layouts.app')

@section('title', 'Daftar Kelas')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">📚 Daftar Kelas</h4>
                    <a href="{{ route('classrooms.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i> Tambah Kelas
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($classrooms->isEmpty())
                    <div class="text-center py-5">
                        <i class="ti ti-school fs-1 text-muted"></i>
                        <p class="text-muted mt-3">Belum ada data kelas</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Kapasitas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classrooms as $i => $classroom)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td class="fw-medium">{{ $classroom->nama_kelas }}</td>
                                        <td>{{ $classroom->kapasitas }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('classrooms.edit', $classroom->id) }}"
                                               class="btn btn-sm btn-outline-primary me-1">
                                                <i class="ti ti-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="ti ti-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
