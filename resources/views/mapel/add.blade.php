@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Mapel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('postMapel') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kodeMapel" class="col-md-4 col-form-label text-md-right">Kode Mapel</label>

                            <div class="col-md-6">
                                <input id="kodeMapel" type="text" class="form-control @error('kodeMapel') is-invalid @enderror" name="kodeMapel" value="{{ old('kodeMapel') }}" required autocomplete="kodeMapel" autofocus>

                                @error('kodeMapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namaMapel" class="col-md-4 col-form-label text-md-right">Nama Mapel</label>

                            <div class="col-md-6">
                                <input id="namaMapel" type="text" class="form-control @error('namaMapel') is-invalid @enderror" name="namaMapel" value="{{ old('namaMapel') }}" required autocomplete="namaMapel" autofocus>

                                @error('namaMapel')
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
