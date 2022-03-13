@extends('layouts.appadmin')
@section('title', 'Hotel Hebat | Fasilitas Kamar')

@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Fasilitas Kamar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Fasilitas Kamar</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        Tambah Data
    </button>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitas as $f)
                
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $f->kamar->tipe_kamar }}</td>
                <td>{{ $f->nama_fasilitas }}</td>
                <td>
                    <a href="/fasilitas-kamar/{{ $f->id }}/edit" class="btn btn-success">Edit</a>

                    <form action="/fasilitas-kamar/{{ $f->id }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="/fasilitas-kamar" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                        <select class="form-control @error('kamar_id') is-invalid @enderror" id="tipe_kamar" name="kamar_id">
                            <option value="" selected>pilih tipe kamar</option>
                            @foreach ($kamar as $k)
                            <option value="{{ $k->id }}">{{ $k->tipe_kamar }}</option>
                            @endforeach
                        </select>
                        @error('kamar_id')
                        <div class="invalid-feedback"> 
                            {{ $message }}
                        </div>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
                        <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas" placeholder="Nama fasilitas" value="{{ old('nama_fasilitas') }}">
                        @error('nama_fasilitas')
                        <div class="invalid-feedback"> 
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection