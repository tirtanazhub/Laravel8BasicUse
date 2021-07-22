@extends('layouts.master')
@section('title', 'Detil data pegawai CRUD | Laravel 8')
@section('content')
<h1 class="text-center">Detil Data Pegawai</h1>
    <p></p>
    <div class="card text-white bg-dark">
        <div class="card-header text-center"><img class="rounded-circle" src="{{ asset('imgpegawai/'. $data->img) }}" width="360px"></div>
            <div class="card-body">
                <h5>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data->nama }}</h5>
                <h5>Jenis kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $data->kelamin }}</h5>
                <h5>Nomor handphone : {{ $data->hp }}</h5>
            </div> 
        <div class="card-footer">
            <p></p>
            <a type="button" href="/pegawai" class="btn btn-secondary">Batal</a>
            <a href="/editpegawai/{{ $data->id }}" type="button" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection