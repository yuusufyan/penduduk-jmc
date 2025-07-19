@extends('layouts.app')

@section('content')
  <h2>Daftar Provinsi</h2>

  <a href="{{ route('provinces.create') }}">[+] Tambah Provinsi</a>

  @if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
  @endif

  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
      <th>Nama Provinsi</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($provinces as $province)
    <tr>
      <td>{{ $province->name }}</td>
      <td>
      <a href="{{ route('provinces.edit', $province->id) }}">Ubah</a> |
      <form action="{{ route('provinces.destroy', $province->id) }}" method="POST" style="display: inline-block;">
      @csrf
      @method('DELETE')
      <button type="submit" onclick="return confirm('Hapus provinsi ini?')">Hapus</button>
      </form>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
@endsection