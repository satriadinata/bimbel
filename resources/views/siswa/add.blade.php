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

                    <form method="POST" action="{{ route('postSiswa') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="namaSiswa" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>

                            <div class="col-md-6">
                                <input id="namaSiswa" type="text" class="form-control @error('namaSiswa') is-invalid @enderror" name="namaSiswa" value="{{ old('namaSiswa') }}" required autocomplete="namaSiswa" autofocus>

                                @error('namaSiswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggalLahirSiswa" class="col-md-4 col-form-label text-md-right">Tgl. Lahir Siswa</label>

                            <div class="col-md-6">
                                <input id="tanggalLahirSiswa" type="date" class="form-control @error('tanggalLahirSiswa') is-invalid @enderror" name="tanggalLahirSiswa" value="{{ old('tanggalLahirSiswa') }}" required autocomplete="tanggalLahirSiswa" autofocus>

                                @error('tanggalLahirSiswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamatSiswa" class="col-md-4 col-form-label text-md-right">Alamat Siswa</label>

                            <div class="col-md-6">
                                <input id="alamatSiswa" type="text" class="form-control @error('alamatSiswa') is-invalid @enderror" name="alamatSiswa" value="{{ old('alamatSiswa') }}" required autocomplete="alamatSiswa" autofocus>

                                @error('alamatSiswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="noTelpSiswa" class="col-md-4 col-form-label text-md-right">No. Telp Siswa</label>

                            <div class="col-md-6">
                                <input id="noTelpSiswa" type="text" class="form-control @error('noTelpSiswa') is-invalid @enderror" name="noTelpSiswa" value="{{ old('noTelpSiswa') }}" required autocomplete="noTelpSiswa" autofocus>

                                @error('noTelpSiswa')
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
