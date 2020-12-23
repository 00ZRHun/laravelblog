@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 6 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                {{-- <form action="{{ route('posts.show',$post->id) }}" method="POST"> --}}
                    {{-- @csrf
                    @method('READ') --}}
                    {{-- <button class="btn btn-info">Show</button> --}}
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    {{-- BOTH are SAME --}}
                    <button type="submit" class="btn btn-danger">Delete</button> 
                    {{-- <button type="submit" class="btn btn-danger">Delete</button>  --}}
                    {{-- <a class="btn btn-danger" href="{{ route('posts.delete',$post->id) }}">Delete</a> --}}
                    {{-- <input type="submit" value="Delete" class="btn btn-danger"> --}}
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection