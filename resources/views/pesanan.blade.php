@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Daftar Pesanan')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            
            <li class="breadcrumb-item active">Daftar Pesanan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Pesanan') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Pesan</th>
                                    <th>Paket</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $pesanan->name }}</td>
                                    <td>{{ $pesanan->email }}</td>
                                    <td>{{ $pesanan->phone }}</td>
                                    <td>{{ $pesanan->pesan }}</td>
                                    <td>{{ $pesanan->paket }}</td>
                                    <td>{{ $pesanan->created_at }}</td>
                                    <td>
                                        <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
