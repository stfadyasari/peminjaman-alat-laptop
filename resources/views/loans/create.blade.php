@extends('layouts.app')

@section('content')
<h3>Ajukan Peminjaman</h3>
<form method="POST" action="{{ route('loans.store') }}">
  @csrf
  <div class="mb-3">
    <label>Pilih Alat</label>
    <select name="device_id" class="form-select">
      @foreach($devices as $d)
        <option value="{{ $d->id }}">{{ $d->name }} - {{ optional($d->category)->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Tanggal Mulai</label>
    <input type="date" name="start_date" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Tanggal Selesai</label>
    <input type="date" name="end_date" class="form-control">
  </div>
  <div class="mb-3">
    <label>Catatan</label>
    <textarea name="note" class="form-control"></textarea>
  </div>
  <button class="btn btn-primary">Kirim Permohonan</button>
</form>
@endsection
