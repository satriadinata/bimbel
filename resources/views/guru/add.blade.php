@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Siswa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('postGuru') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="namaGuru" class="col-md-4 col-form-label text-md-right">Nama Guru</label>

                            <div class="col-md-6">
                                <input id="namaGuru" type="text" class="form-control @error('namaGuru') is-invalid @enderror" name="namaGuru" value="{{ old('namaGuru') }}" required autocomplete="namaGuru" autofocus>

                                @error('namaGuru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggalLahirGuru" class="col-md-4 col-form-label text-md-right">Tgl. Lahir Guru</label>

                            <div class="col-md-6">
                                <input id="tanggalLahirGuru" type="date" class="form-control @error('tanggalLahirGuru') is-invalid @enderror" name="tanggalLahirGuru" value="{{ old('tanggalLahirGuru') }}" required autocomplete="tanggalLahirGuru" autofocus>

                                @error('tanggalLahirGuru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamatGuru" class="col-md-4 col-form-label text-md-right">Alamat Guru</label>

                            <div class="col-md-6">
                                <input id="alamatGuru" type="text" class="form-control @error('alamatGuru') is-invalid @enderror" name="alamatGuru" value="{{ old('alamatGuru') }}" required autocomplete="alamatGuru" autofocus>

                                @error('alamatGuru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="noTelpGuru" class="col-md-4 col-form-label text-md-right">No. Telp Guru</label>

                            <div class="col-md-6">
                                <input id="noTelpGuru" type="text" class="form-control @error('noTelpGuru') is-invalid @enderror" name="noTelpGuru" value="{{ old('noTelpGuru') }}" required autocomplete="noTelpGuru" autofocus>

                                @error('noTelpGuru')
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
