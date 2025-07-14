@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Pendaftaran Diterima</h3>

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
                    <td>{{ $pelamar->tanggal_daftar }}</td>
                    <td>
                        <span class="badge
                            @if($pelamar->status == 'pending') bg-warning
                            @elseif($pelamar->status == 'diterima') bg-success
                            @else bg-danger
                            @endif">
                            {{ ucfirst($pelamar->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
