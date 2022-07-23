@extends('layouts.app')
@section('content')
    <h1 class="text-center text-success display-1"> Show File : {{ $files->title }} </h1>
    <div class="container col-md-6">
        <div class="card">
            File Title : {{ $files->title }}
            <div class="card-body">
                File Description : {{ $files->description }}
                File Name :{{ $files->file }}
            </div>
            <a href="{{ route('files.download',$files->id) }}" class="btn btn-outline-success btn-block">DOWNLOAD YOUR FILE</a>
        </div>
    </div>
@endsection
