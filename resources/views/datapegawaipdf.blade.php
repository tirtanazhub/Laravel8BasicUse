@extends('layouts.master')
<h2 class="text-center">Data Pegawai</h2>         
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenkel</th>
            <th scope="col">No. HP</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @if(!empty($data) && $data->count())
            @foreach( $data as $line)
    <tr>
        <td scope="row">{{ ++$no }}</td>
        <td>
            <img src="{{ public_path('imgpegawai/'.$line->img) }}" alt="" style="width: 75px">
        </td>
        <td>{{ $line->nama }}</td>
        <td>{{ $line->kelamin }}</td>
        <td>{{ $line->hp }}</td>
    </tr>
        @endforeach
    @else 
        <tr>
            <td class="bg-danger" colspan="7">Tidak ada data.</td>
        </tr>
    @endif
    </tbody>
</table>
</div>
