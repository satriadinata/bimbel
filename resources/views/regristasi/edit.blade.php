@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Nilai</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('postNilai') }}">
                        @csrf
                        <input type="hidden" name="ids" value="{{$data->idSiswa}}">
                        <input type="hidden" name="idk" value="{{$data->idKelasMapel}}" >

                        <div class="form-group row">
                            <label for="nilaiAkhir" class="col-md-4 col-form-label text-md-right">Nilai</label>

                            <div class="col-md-6">
                                <input id="nilaiAkhir" type="number" class="form-control @error('nilaiAkhir') is-invalid @enderror" name="nilaiAkhir" value="{{ $data->nilaiAkhir }}" required autocomplete="nilaiAkhir" autofocus>

                                @error('nilaiAkhir')
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
