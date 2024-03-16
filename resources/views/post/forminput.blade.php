@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buat Postingan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('input') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('judul postingan') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="judul" value="{{ old('name') }}" required autocomplete="name" autofocus>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Gambar') }}</label>

                            <div class="col-md-6">
                                <input id="gambar" type="file" accept="jpg,jpeg,png,image/jpg, image/png" class="form-control @error('email') is-invalid @enderror" name="gambar" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Posting') }}
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
