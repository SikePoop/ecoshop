@extends('admin.layouts.template')
@section('pagetitle')
Edit Blog post
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Edit Blog post</h4>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('admin.updateblogpost') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $blogpost_info->blogpost_id }}" name="blogpost_id">
                    @php
                      $blogs = App\Models\blog::latest()->get();
                    @endphp
                    <div class="form-group">
                        <label for="blog_name">Select Blog</label>
                        <select name="blog_id" class="form-control">
                          @foreach ($blogs as $blog)
                            <option value="{{ $blog->blog_id }}" @if ($blogpost_info->blog_id == $blog->blog_id)
                              Selected
                            @endif>{{ $blog->blog_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="blogpost_title">Enter Blog post Title</label>
                        <input type="text" class="form-control" id="blogpost_title" name="blogpost_title" 
                        value="{{ $blogpost_info->blogpost_title }}">
                      </div><div class="form-group">
                        <label for="blogpost_body">Enter Blog post Body</label>
                        <input type="text" class="form-control" id="blogpost_body" name="blogpost_body" 
                        value="{{ $blogpost_info->blogpost_body }}">
                      </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">Update Blog post</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection