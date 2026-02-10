@extends('layouts.app')

@section('content')
<h3>Data Peminjaman</h3>
<table class="table">
  <thead><tr><th>#</th><th>User</th><th>Alat</th><th>Periode</th><th>Status</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($loans as $loan)
    <tr>
      <td>{{ $loan->id }}</td>
      <td>{{ optional($loan->user)->name }}</td>
      <td>{{ optional($loan->device)->name }}</td>
      <td>{{ $loan->start_date }} - {{ $loan->end_date }}</td>
      <td>{{ $loan->status }}</td>
      <td>
        @if(auth()->user() && auth()->user()->role === 'petugas')
          @if($loan->status === 'pending')
            <form method="POST" action="{{ route('loans.approve',$loan) }}" style="display:inline">@csrf<button class="btn btn-sm btn-success">Setujui</button></form>
            <form method="POST" action="{{ route('loans.reject',$loan) }}" style="display:inline">@csrf<button class="btn btn-sm btn-warning">Tolak</button></form>
          @endif
          @if($loan->status === 'approved')
            <form method="POST" action="{{ route('loans.return',$loan) }}" style="display:inline">@csrf<button class="btn btn-sm btn-primary">Tandai Kembali</button></form>
          @endif
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $loans->links() }}
@endsection
