@extends('admin.layouts.template')
@section('pagetitle')
Add Supplier
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Add Blog</h4>
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
            <form action="{{ route('admin.storeblog') }}" method="POST">
              @csrf
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="blog_name">Enter Blog Category Name</label>
                      <input type="text" class="form-control" id="blog_name" name="blog_name">
                    </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Add blog</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection