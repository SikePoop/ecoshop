@extends('admin.layouts.template')
@section('pagetitle')
Edit Blog
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Edit Blog</h4>
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
            <form action="{{ route('admin.updateblog') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $blog_info->blog_id }}" name="blog_id">
                    <div class="form-group">
                      <label for="blog_name">Enter Blog Name</label>
                      <input type="text" class="form-control" id="blog_name" name="blog_name" 
                      value="{{ $blog_info->blog_name }}">
                    </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Update Blog</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection