@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Jadwal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('updateJadwal/'.$data->idJadwal) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="idKelasMapel" class="col-md-4 col-form-label text-md-right">Pilih Kelas</label>

                            <div class="col-md-6">
                                <select name="idKelasMapel" value="{{ old('idKelasMapel') }}" class="form-control @error('idKelasMapel') is-invalid @enderror" required autocomplete="idKelasMapel">
                                <?php foreach ($kelas as $key=>$value){ ?>
                                    <option <?php  echo ($value->idKelasMapel == $data->idKelasMapel) ? 'selected':'';  ?> value="{{$value->idKelasMapel}}" ><?php echo $value->kodeMapel.' - '.$value->namaMapel .' '.$value->kelas.' - '.$value->namaGuru ?></option>
                                <?php } ?>
                                </select>

                                @error('idKelasMapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hari" class="col-md-4 col-form-label text-md-right">Hari</label>

                            <div class="col-md-6">
                                <select name="hari" value="{{ old('hari') }}" class="form-control @error('hari') is-invalid @enderror" required autocomplete="hari">
                                    <option <?php  echo ('Senin' == $data->hari) ? 'selected':'';  ?> value="Senin" >Senin</option>
                                    <option <?php  echo ('Selasa' == $data->hari) ? 'selected':'';  ?> value="Selasa" >Selasa</option>
                                    <option <?php  echo ('Rabu' == $data->hari) ? 'selected':'';  ?> value="Rabu" >Rabu</option>
                                    <option <?php  echo ('Kamis' == $data->hari) ? 'selected':'';  ?> value="Kamis" >Kamis</option>
                                    <option <?php  echo ('Jumat' == $data->hari) ? 'selected':'';  ?> value="Jumat" >Jumat</option>
                                    <option <?php  echo ('Sabtu' == $data->hari) ? 'selected':'';  ?> value="Sabtu" >Sabtu</option>
                                </select>

                                @error('hari')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sesi" class="col-md-4 col-form-label text-md-right">Sesi</label>

                            <div class="col-md-6">
                                <input id="sesi" type="text" class="form-control @error('sesi') is-invalid @enderror" name="sesi" value="{{ $data->sesi }}" required autocomplete="sesi" autofocus>

                                @error('sesi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
