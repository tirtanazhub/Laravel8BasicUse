@extends('layouts.master')
@section('title', 'Edit data pegawai CRUD | Laravel 8')
@section('content')
<h1 class="text-center">Edit Data Pegawai</h1>
    <p></p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/doeditpegawai/{{ $data->id }}" enctype="multipart/form-data">@csrf
                            <div class="form-group mb-3">
                                <label for="img">Upload file : </label>
                                <input type="file" class="form-control" id="img" placeholder="Upload file here..." name="img" value=" {{ $data->img }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama">Nama :</label>
                                <input type="text" class="form-control" id="nama" placeholder="Enter Nama" name="nama" value=" {{ $data->nama }}">
                            </div>
                            <div class="form-group  mb-3">
                            <label for="kelamin">Jenis Kelamin :  </label>
                            <select name="kelamin" class="custom-select">
                                <option selected>{{ $data->kelamin }}</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                                <option value="non">Tidak ada</option>
                            </select>
                            </div>
                            <div class="form-group  mb-3">
                                <label for="hp">Nomor HP : </label>
                                <input type="text" class="form-control" id="hp" placeholder="Enter Nomor HP" name="hp" value="{{ $data->hp }}" >
                            </div>
                            <a type="button" href="/pegawai" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Editkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection