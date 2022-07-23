@extends('layouts.app')
@section('content')
    <h1 class="text-center text-warning display-1"> Edit List  {{ $files->title }} </h1>
    <div class="container col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('files.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> File Title </label>
                        <input class="form-control @error('title') is-invalid @enderror" value="{{ $file->title }}"
                            type="text" name="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> File Description </label>
                        <input class="form-control @error('Description') is-invalid @enderror"
                            value="{{ $file->description }}" type="text" name="description">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Upload Your File : {{ $file->file }} </label>
                        <input class="form-control btn btn-success py-1 @error('file') is-invalid @enderror" type="file"
                            name="fileInput">
                        @error('fileInput')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success"> Upload File </button>
                </form>
            </div>
        </div>
    </div>
@endsection
