@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pertemuan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('postPresensi') }}">
                        @csrf
                        <input type="hidden" name="idKelasMapel" value="{{$id}}" >

                        <div class="form-group row">
                            <label for="pertemuanKe" class="col-md-4 col-form-label text-md-right">Pertemuan-Ke</label>

                            <div class="col-md-6">
                                <input id="pertemuanKe" type="number" class="form-control @error('pertemuanKe') is-invalid @enderror" name="pertemuanKe" value="{{ old('pertemuanKe') }}" required autocomplete="pertemuanKe" autofocus>

                                @error('pertemuanKe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggalPertemuan" class="col-md-4 col-form-label text-md-right">tanggalPertemuan</label>

                            <div class="col-md-6">
                                <input id="tanggalPertemuan" type="date" class="form-control @error('tanggalPertemuan') is-invalid @enderror" name="tanggalPertemuan" value="{{ old('tanggalPertemuan') }}" required autocomplete="tanggalPertemuan" autofocus>

                                @error('tanggalPertemuan')
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
