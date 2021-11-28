@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kelas</div>

                <div class="card-body">
                <a style="color: white;" href="{{route('addKelas')}}" class="btn btn-primary">Tambah Data</a>
                <br>
                <br>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Nama Mapel</th>
                            <th>Kelas</th>
                            <th>Guru</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->kodeMapel}}</td>
                               <td>{{$value->namaMapel}}</td>
                               <td>{{$value->kelas}}</td>
                               <td>{{$value->namaGuru}}</td>
                               <td>
                                   <a onclick="hapus('<?php echo $value->idKelasMapel; ?>')" style="color:white;" class="btn btn-danger">Delete</a>
                                   <a href="{{url('editKelas/').'/'.$value->idKelasMapel}}" style="color:white;" class="btn btn-success">Edit</a>
                               </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hapus(id){
        if(window.confirm('Sure?')){
            window.location.href='<?php echo url('delKelas/') ?>'+'/'+id;
        }
    }
</script>
@endsection
