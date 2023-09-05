@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="ms-4">
            <div>
                <h2>POSTS</h2>
            </div>
            <div>
                <a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}">Create New Post</a>
            </div>
        </div>
    </div>
    @if ($message = session('success'))
        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card m-4">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th width="10%">S.no.</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th width="20%">Actions</th>
                </tr>
                <?php $i = 0; ?>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-sm btn-secondary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection