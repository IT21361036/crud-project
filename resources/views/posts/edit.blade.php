@extends('layouts.app')
@section('content')
<div class="card m-4">
  <div class="card-header">
    <h4>Edit Post</h4>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $post->title }}"/>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control form-control-sm" name="body">{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-secondary mt-4">Submit</button>
    </form>
  </div>
</div>
@endsection