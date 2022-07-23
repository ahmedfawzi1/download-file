@extends('layouts.app')
@section('content')
    <h1 class="text-center text-success display-1"> File List </h1>
    <div class="container col-md-7">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>File Title</td>
                        <td colspan="8">Action</td>
                    </tr>
                    @foreach ($files as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td><a style="font-size: 25px" class="text-info" href="{{ route('files.show', $item->id) }}"><i
                                        class="fa-solid fa-eye"></i></a></td>
                            <td><a style="font-size: 25px" class="text-warning"
                                    href="{{ route('files.show', $item->id) }}"><i class="fa-solid fa-file-pen"></i></a></td>
                            <td><a style="font-size: 25px" class="text-danger"
                                    href="{{ route('files.destroy', $item->id) }}"><i class="fa-solid fa-trash-can"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
