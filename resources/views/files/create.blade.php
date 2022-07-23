@extends('layouts.app')

@section('content')
    <h1 class="text-center text-success display-1"> Create File </h1>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    @if (Session::has('done'))
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif
    <div class="container col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> File Title </label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> File Description </label>
                        <input class="form-control @error('Description') is-invalid @enderror" type="text"
                            name="description">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Upload Your File </label>
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
