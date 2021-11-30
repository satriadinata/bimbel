@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kelas</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Mapel</th>
                            <th>Kelas</th>
                            <th>Jadwal</th>
                            <th>Sesi</th>
                            <th>Guru</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->namaMapel}}</td>
                               <td>{{$value->kelas}}</td>
                               <td>{{$value->hari}}</td>
                               <td>{{$value->sesi}}</td>
                               <td>{{$value->namaGuru}}</td>
                               <td>
                                   <a href="{{url('detailPresensiKelas/').'/'.$value->idKelasMapel}}" style="color:white;" class="btn btn-success">Lihat Presensi</a>
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
            window.location.href='<?php echo url('delSiswa/') ?>'+'/'+id;
        }
    }
</script>
@endsection
