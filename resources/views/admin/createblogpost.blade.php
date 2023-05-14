@php
    $blogs = App\Models\blog::get();
@endphp
@extends('admin.layouts.template')
@section('pagetitle')
Create Blog post
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Create Blog post</h4>
            </div>
            <form action="{{ route('admin.storeblogpost') }}" method="POST">
              @csrf
                <div class="card-body">
                
                    <div class="form-group">
                        <label for="blog_name">Select blog</label>
                        <select name="blog_id" class="form-control">
                          @foreach ($blogs as $blog)
                            <option value="{{ $blog->blog_id }}">{{ $blog->blog_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="blogpost_title">Enter Blogpost Title</label>
                        <input type="text" class="form-control" id="blogpost_title" 
                        name="blogpost_title" 
                        >
                      </div>
                      <div class="form-group">
                        <label for="blogpost_body">Enter Blogpost Body</label>
                        <input type="text" class="form-control" id="blogpost_body" 
                        name="blogpost_body"
                        >
                      </div>
                  <div class="card-footer">
                    <input type="submit" value="Create Supply" class="btn btn-primary">
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection