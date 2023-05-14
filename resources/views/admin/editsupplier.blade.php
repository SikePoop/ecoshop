@extends('admin.layouts.template')
@section('pagetitle')
Edit supplier
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Edit Supplier</h4>
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
            <form action="{{ route('admin.updatesupplier') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $supplier_info->supplier_id }}" name="supplier_id">
                    <div class="form-group">
                      <label for="supplier_name">Enter Supplier Name</label>
                      <input type="text" class="form-control" id="supplier_name" name="supplier_name" 
                      value="{{ $supplier_info->supplier_name }}">
                    </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Update supplier</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection