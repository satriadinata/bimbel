@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Kelas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('updateKelas/'.$data->idKelasMapel) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kodeMapel" class="col-md-4 col-form-label text-md-right">Mapel</label>

                            <div class="col-md-6">
                                <select name="kodeMapel" value="{{ old('kodeMapel') }}" class="form-control @error('kodeMapel') is-invalid @enderror" required autocomplete="kodeMapel">
                                <?php foreach ($mapel as $key=>$value){ ?>
                                    <option <?php  echo ($value->kodeMapel == $data->kodeMapel) ? 'selected':'';  ?> value="{{$value->kodeMapel}}" ><?php echo $value->kodeMapel.' - '.$value->namaMapel ?></option>
                                <?php } ?>
                                </select>

                                @error('kodeMapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idGuru" class="col-md-4 col-form-label text-md-right">Guru</label>

                            <div class="col-md-6">
                                <select name="idGuru" value="{{ old('idGuru') }}" class="form-control @error('idGuru') is-invalid @enderror" required autocomplete="idGuru">
                                <?php foreach ($guru as $key=>$value){ ?>
                                    <option <?php  echo ($value->idGuru == $data->idGuru) ? 'selected':'';  ?> value="{{$value->idGuru}}" ><?php echo $value->namaGuru ?></option>
                                <?php } ?>
                                </select>

                                @error('idGuru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelas" class="col-md-4 col-form-label text-md-right">Kelas</label>

                            <div class="col-md-6">
                                <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ $data->kelas }}" required autocomplete="kelas" autofocus>

                                @error('kelas')
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
