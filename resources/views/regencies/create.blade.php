@extends('layouts.app')

@section('content')
  <h2>Tambah Kabupaten</h2>

  <form action="{{ route('regencies.store') }}" method="POST">
    @csrf

    <label>Pilih Provinsi:</label>
    <select name="province_id">
    <option value="">-- Pilih Provinsi --</option>
    @foreach ($provinces as $prov)
    <option value="{{ $prov->id }}" {{ old('province_id') == $prov->id ? 'selected' : '' }}>
      {{ $prov->name }}
    </option>
    @endforeach
    </select>
    @error('province_id')
    <div class="alert">{{ $message }}</div>
    @enderror

    <label>Nama Kabupaten:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
    <div class="alert">{{ $message }}</div>
    @enderror

    <!-- <label>Jumlah Penduduk:</label>
    <input type="text" name="population" value="{{ old('population') }}">
    @error('population')
    <div class="alert">{{ $message }}</div>
    @enderror -->

    <br>
    <button type="submit">Simpan</button>
    <a href="{{ route('regencies.index') }}" class="btn-secondary" style="margin-left: 10px;">Batal</a>
  </form>
@endsection