@extends('layouts.app')
@section('title', 'Data Pelamar Magang')
@section('content')
<div class="container">
    <h2 class="mb-4">Data Pelamar Magang</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Lowongan</th>
                <th>Status</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelamars as $pelamar)
            <tr>
                <td>{{ $pelamar->user->name }}</td>
                <td>{{ $pelamar->lowongan->judul }}</td>
                <td>
                    @if($pelamar->status == 'pending')
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-clock"></i> Pending
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('admin.pelamar.updateStatus', $pelamar->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="diterima">
                                        <button class="dropdown-item text-success" type="submit">
                                            <i class="fas fa-check-circle"></i> Diterima
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.pelamar.updateStatus', $pelamar->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="ditolak">
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="fas fa-times-circle"></i> Ditolak
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @elseif($pelamar->status == 'diterima')
                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Diterima</span>
                    @elseif($pelamar->status == 'ditolak')
                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Ditolak</span>
                    @endif
                </td>
                <td>{{ $pelamar->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tambahkan Font Awesome & Bootstrap JS jika belum -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
