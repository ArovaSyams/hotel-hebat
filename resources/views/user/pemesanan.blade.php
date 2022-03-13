@extends('layouts.appuser')
@section('title', 'Hotel Hebat | Pemesanan')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Pemesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pemesanan</a></li>
                {{-- <li class="breadcrumb-item active">Pemesanan</li> --}}
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')
    

        <form action="/pemesanan" method="post" class="my-5">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="" class="form-label">Tanggal Check In</label>
                    <input type="date" class="form-control @error('tanggal_cek_in') is-invalid @enderror" placeholder="Tanggal check in" name="tanggal_cek_in" value="{{ old('tanggal_cek_in') }}">
                    @error('tanggal_cek_in')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">Tanggal Check Out</label>
                    <input type="date" class="form-control @error('tanggal_cek_out') is-invalid @enderror" placeholder="Tanggal check out" name="tanggal_cek_out" value="{{ old('tanggal_cek_out') }}">
                    @error('tanggal_cek_out')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">Jumlah Kamar</label>
                    <input type="text" class="form-control @error('jumlah_kamar') is-invalid @enderror" placeholder="Jumlah Kamar" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}">
                    @error('jumlah_kamar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" placeholder="user" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
                @error('nama_pemesan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="user@email.com" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Handphone</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08123456789" name="no_telp" value="{{ old('no_telp') }}">
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_tamu" class="form-label">Nama Tamu</label>
                <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" id="nama_tamu" placeholder="User" name="nama_tamu" value="{{ old('nama_tamu') }}">
                @error('nama_tamu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <label for="" class="form-label">Tipe Kamar</label>
            <select class="form-control @error('kamar_id') is-invalid @enderror" aria-label="Default select example" name="kamar_id">
                <option value="" selected>Piih tipe kamar</option>
                @foreach ($kamar as $k)
                <option value="{{ $k->id }}">{{ $k->tipe_kamar }}</option>
                @endforeach   
            </select>
            @error('kamar_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary mt-3">Konfirmasi Pemesanan</button>
        </form>


@endsection