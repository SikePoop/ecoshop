@extends('admin.layouts.template')
@section('pagetitle')
All Blog post
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>All Blog post</h4>
            </div>
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Blog Name</th>
                      <th>Blog post Title</th>
                      <th>Blog post Body</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($blogposts as $blogpost)
                      @php
                            $blog_name = App\Models\blog::where('blog_id',$blogpost->blog_id)->get()->value('blog_name');                        @endphp
                      <tr>
                      <td>{{ $blogpost->blogpost_id }}</td>
                      <td>{{ $blog_name }}</td>
                      <td>{{ $blogpost->blogpost_title }}</td>
                      <td>{{ $blogpost->blogpost_body }}</td>
                      <td>
                        <a href="{{ route('admin.editblogpost',$blogpost->blogpost_id)  }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.deleteblogpost',$blogpost->blogpost_id) }}" class="btn btn-danger">Delete</a>
                      </td>
                      @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span
                        class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
    </div>
</div>
@endsection