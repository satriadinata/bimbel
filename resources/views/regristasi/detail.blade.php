@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah siswa ke kelas</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('addRegistrasi/'.$kelas->idKelasMapel) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="idSiswa" class="col-md-4 col-form-label text-md-right">Siswa</label>

                            <div class="col-md-6">
                                <select name="idSiswa" value="{{ old('idSiswa') }}" class="form-control @error('idSiswa') is-invalid @enderror" required autocomplete="idSiswa">
                                <?php foreach ($siswa as $key=>$value){ ?>
                                    <option value="{{$value->idSiswa}}" ><?php echo $value->namaSiswa ?></option>
                                <?php } ?>
                                </select>

                                @error('idSiswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambahkan ke kelas
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <br>
                <div class="card-header">Data Siswa Kelas {{$kelas->namaMapel.' - '.$kelas->kelas.' - '.$kelas->namaGuru}}</div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Akhir</th>
                            <th>Predikat</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) {?>
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$value->namaSiswa}}</td>
                               <td>{{$value->nilaiAkhir}}</td>
                               <td>{{$value->predikat}}</td>
                               <td>
                                    <a onclick="hapus('<?php echo $value->idSiswa ?>','<?php echo $value->idKelasMapel ?>')" style="color:white;" class="btn btn-danger">Delete</a>
                                    <a href="{{url('editNilai/').'/'.$value->idSiswa.'/'.$value->idKelasMapel}}" style="color:white;" class="btn btn-success">Edit Nilai</a>
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
