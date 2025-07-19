@extends('layouts.app')

@section('content')
  <h2>Tambah Provinsi</h2>

  <form action="{{ route('provinces.store') }}" method="POST">
    @csrf

    <label>Nama Provinsi:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
    <div class="alert">{{ $message }}</div>
    @enderror

    <br>
    <button type="submit">Simpan</button>
    <a href="{{ route('provinces.index') }}" class="btn-secondary" style="margin-left: 10px;">Batal</a>
  </form>
@endsection