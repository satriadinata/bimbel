@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Pertemuan Kelas {{$kelas->namaMapel.' - '.$kelas->kelas.' - '.$kelas->namaGuru}}</div>
                <div class="card-body">

                    <a href="{{url('tambahPertemuan/'.$kelas->idKelasMapel)}}" style="color:white;" class="btn btn-primary">Tambah Pertemuan</a>
                    <br>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Pertemuan-ke</th>
                            <th>Tanggal Pertemuan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->pertemuanKe}}</td>
                               <td>{{$value->tanggalPertemuan}}</td>
                               <td>
                                    <a onclick="hapus('<?php echo $value->idKelasMapel ?>','<?php echo $value->pertemuanKe ?>')" style="color:white;" class="btn btn-danger">Delete</a>
                                    <a href="{{url('detailPresensi/').'/'.$value->idKelasMapel.'/'.$value->pertemuanKe}}" style="color:white;" class="btn btn-success">Detail Presensi</a>
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
    function hapus(ids,idk){
        if(window.confirm('Sure?')){
            window.location.href='<?php echo url('hapusRegis/') ?>'+'/'+ids+'/'+idk;
        }
    }
</script>
@endsection
