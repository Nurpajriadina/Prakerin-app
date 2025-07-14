@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Daftar Semua Pendaftar</h3>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Lowongan</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelamars as $pelamar)
                <tr>
                    <td>{{ $pelamar->user->name }}</td>
                    <td>{{ $pelamar->user->email }}</td>
                    <td>{{ $pelamar->lowongan->judul ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($pelamar->tanggal_daftar)->format('d-m-Y') }}</td>
                    <td class="text-center">
                        @if($pelamar->status == 'pending')
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-warning btn-sm dropdown-toggle d-flex align-items-center justify-content-center gap-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-clock"></i> Pending
                                </button>
                                <ul class="dropdown-menu text-center">
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
