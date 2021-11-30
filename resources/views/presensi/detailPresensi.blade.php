@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Presensi Kelas {{$kelas->namaMapel.' - '.$kelas->kelas.' - '.$kelas->namaGuru}} Pertemuan ke {{$data[0]->pertemuanKe}}</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->namaSiswa}}</td>
                               <td>{{$value->ket}}</td>
                               <td>
                                <?php if($value->ket=='H'): ?>
                                    <a href="{{url('cancel/').'/'.$value->idPresensi}}" style="color:white;" class="btn btn-danger">Batalkan</a>
                                <?php else: ?>
                                    <a href="{{url('present/').'/'.$value->idPresensi}}" style="color:white;" class="btn btn-primary">Hadir</a>
                                <?php endif ?>
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
