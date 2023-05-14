@extends('admin.layouts.template')
@section('pagetitle')
Add Supplier
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Add Supplier</h4>
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
            <form action="{{ route('admin.storesupplier') }}" method="POST">
              @csrf
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="supplier_name">Enter Supplier Name</label>
                      <input type="text" class="form-control" id="supplier_name" name="supplier_name">
                    </div>
                    <div class="form-group">
                      <label for="email">Enter Supplier Email</label>
                      <input type="text" class="form-control" id="email" name="email">
                    </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Add Supplier</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection