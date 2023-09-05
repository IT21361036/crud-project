@extends('layouts.app')
@section('content')
<div class="card m-4">
  <div class="card-header">
    <h4>Create Post</h4>
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
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control form-control-sm" name="title"/>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control form-control-sm" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-secondary mt-4">Add Post</button>
    </form>
  </div>
</div>
@endsection