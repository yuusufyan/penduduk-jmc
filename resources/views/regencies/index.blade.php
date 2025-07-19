@extends('layouts.app')

@section('content')
  <h2>Daftar Kabupaten</h2>

  <a href="{{ route('regencies.create') }}">[+] Tambah Kabupaten</a>

  <form method="GET" action="{{ route('regencies.index') }}" style="margin-top: 15px;">
    <label>Filter Provinsi:</label>
    <select name="province_id" onchange="this.form.submit()">
    <option value="">-- Semua Provinsi --</option>
    @foreach ($provinces as $prov)
    <option value="{{ $prov->id }}" {{ request('province_id') == $prov->id ? 'selected' : '' }}>
      {{ $prov->name }}
    </option>
    @endforeach
    </select>
  </form>

  @if (session('success'))
    <div class="alert">{{ session('success') }}</div>
  @endif

  <table>
    <thead>
    <tr>
      <th>Nama Kabupaten</th>
      <th>Provinsi</th>
      <!-- <th>Jumlah Penduduk</th> -->
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($regencies as $regency)
    <tr>
      <td>{{ $regency->name }}</td>
      <td>{{ $regency->province->name }}</td>
      <!-- <td>{{ number_format($regency->population->total ?? 0) }}</td> -->
      <td>
      <a href="{{ route('regencies.edit', $regency->id) }}">Ubah</a> |
      <form action="{{ route('regencies.destroy', $regency->id) }}" method="POST" style="display:inline-block">
      @csrf
      @method('DELETE')
      <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
      </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4">Belum ada data kabupaten</td>
    </tr>
    @endforelse
    </tbody>
  </table>
@endsection
