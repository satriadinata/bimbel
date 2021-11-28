@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Guru</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->namaGuru}}</td>
                               <td>{{$value->tanggalLahirGuru}}</td>
                               <td>{{$value->alamatGuru}}</td>
                               <td>{{$value->noTelpGuru}}</td>
                               <td>
                                   <a onclick="hapus({{$value->idGuru}})" style="color:white;" class="btn btn-danger">Delete</a>
                                   <a href="{{url('editGuru/').'/'.$value->idGuru}}" style="color:white;" class="btn btn-success">Edit</a>
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
            window.location.href='<?php echo url('delGuru/') ?>'+'/'+id;
        }
    }
</script>
@endsection
