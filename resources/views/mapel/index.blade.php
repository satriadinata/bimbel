@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Mapel</div>

                <div class="card-body">
                <a style="color: white;" href="{{route('addMapel')}}" class="btn btn-primary">Tambah Data</a>
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
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->kodeMapel}}</td>
                               <td>{{$value->namaMapel}}</td>
                               <td>
                                   <a onclick="hapus('<?php echo $value->kodeMapel; ?>')" style="color:white;" class="btn btn-danger">Delete</a>
                                   <a href="{{url('editMapel/').'/'.$value->kodeMapel}}" style="color:white;" class="btn btn-success">Edit</a>
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
            window.location.href='<?php echo url('delMapel/') ?>'+'/'+id;
        }
    }
</script>
@endsection
