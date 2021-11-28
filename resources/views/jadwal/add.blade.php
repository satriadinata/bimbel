@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Data Jadwal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('postJadwal') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="idKelasMapel" class="col-md-4 col-form-label text-md-right">Pilih Kelas</label>

                            <div class="col-md-6">
                                <select name="idKelasMapel" value="{{ old('idKelasMapel') }}" class="form-control @error('idKelasMapel') is-invalid @enderror" required autocomplete="idKelasMapel">
                                <?php foreach ($data as $key=>$value){ ?>
                                    <option value="{{$value->idKelasMapel}}" ><?php echo $value->kodeMapel.' - '.$value->namaMapel .' '.$value->kelas.' - '.$value->namaGuru ?></option>
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
                                    <option value="Senin" >Senin</option>
                                    <option value="Selasa" >Selasa</option>
                                    <option value="Rabu" >Rabu</option>
                                    <option value="Kamis" >Kamis</option>
                                    <option value="Jumat" >Jumat</option>
                                    <option value="Sabtu" >Sabtu</option>
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
                                <input id="sesi" type="text" class="form-control @error('sesi') is-invalid @enderror" name="sesi" value="{{ old('sesi') }}" required autocomplete="sesi" autofocus>

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
