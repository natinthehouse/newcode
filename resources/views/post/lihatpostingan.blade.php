@extends('layouts.app')

@section('content')

@foreach ($posts as $post)

<div class="container ">
    <div class="row ">
        <div class="col">
            <div class="d-flex justify-content-center">

                <img src="{{ $post->gambar }}" alt="" height="10%" width="16%">
            </div>
            <div class="text-center">
                <p>{{ $post->judul }}</p>
                <p>diposting oleh <b>{{ $user->name }}</b></p>
                <a href="/tampilinput{{ $post->id }}">update</a>
                <a href="/delete{{ $post->id }}">delete</a>

            </div>
        </div>
    </div>
</div>

@endforeach
@endsection