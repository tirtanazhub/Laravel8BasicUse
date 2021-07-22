<!DOCTYPE html>
<html lang="en">
<head>
    <title>Front page CRUD | Laravel 8</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center">Data Pegawai</h1>
    <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>     
        @endif -->
        <div class="row">
            <div class="col-md-4">
                <form action="/pegawai" method="get">@csrf
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Search</span>
                    </div>
                        <input type="search" name="search" class="form-control">
                    </div>
                </form>   
            </div>
        </div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <a href="/expdf" type="button" class="btn btn-info">PDF</a>
        <a href="/exexcel" type="button" class="btn btn-light">Excel</a>
        <!-- Button to Open the Modal -->
        <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
            Import Xcel
        </a> 
        <a href="/tambahpegawai" type="button" class="btn btn-primary">Tambah</a><hr>
        <h5>Data keseluruhan = {{ $counts }}</h5><hr>
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col"><a href="/pegawai">Nama</a></th>
                        <th scope="col">Jenkel</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/pegawaisortbyregister">Register pada</a> </th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data) && $data->count())
                            @foreach( $data as $line)
                        <tr>
                            <td scope="row">{{ ++$no }}</td>
                        <td>
                            <img src="{{ asset('imgpegawai/'.$line->img) }}" alt="" style="width: 100px">
                        </td>
                        <td>{{ $line->nama }}</td>
                        <td>{{ $line->kelamin }}</td>
                        <td>{{ $line->hp }}</td>
                        <td>{{ Carbon\Carbon::parse($line->created_at)->format('j F Y H:i:s') }} +07.00 GMT</td>
                        <td>
                            <a type="button" class="btn btn-danger hps" href="#" data-id ="{{ $line->id }}" data-nama ="{{ $line->nama }}">Hapus</a>
                            <a type="button" class="btn btn-dark" href="/showpegawai/{{ $line->id }}">Show</a>
                        </td>
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
    </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
                </div>
            </div>
            </div>
</div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

<script>

    $('.hps').click(function () { 
        var pegawaiid = $(this).attr('data-id');
        var pegawainama = $(this).attr('data-nama');
        swal({
                title: "Kamu Yakin?",
                text: "Kamu akan menghapus pegawai yang bernama "+pegawainama+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletepegawai/"+pegawaiid+""
                    swal("Data sukses dihapus", {
                    icon: "success",
                    });
                } else {
                    swal("Data batal dihapus.");
                }
            });
    });
</script>  

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

<script>
        function myFunction() {
            var proceed = confirm("Are you sure you want to proceed?");
            if (proceed) {
                alert("Data sukses dihapus.");
            }
        }
</script>
</html> 

