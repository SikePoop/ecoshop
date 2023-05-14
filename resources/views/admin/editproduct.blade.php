@extends('admin.layouts.template')
@section('pagetitle')
Edit Product
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Edit Product</h4>
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
            <form action="{{ route('admin.updateproduct') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <input type="hidden" value="{{ $product_info->id }} " name="id">
                <div class="card-body">
                    <div class="form-group">
                      <label for="product_name">Enter Product Name</label>
                      <input type="text" class="form-control" id="product_name" name="product_name"
                      value="{{ $product_info->product_name }}">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Enter Product Price</label>
                        <input type="text" class="form-control" id="product_price" name="product_price"
                        value="{{ $product_info->product_price }}">
                      </div>
                      <div class="form-group">
                        <label for="product_short_des">Enter Product Short Description</label>
                        <textarea name="product_short_des" id="product_short_des"
                         cols="30" rows="10" class="form-control">{{ $product_info->product_short_des }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="product_long_des">Enter Product Long Description</label>
                        <textarea name="product_long_des" id="product_long_des"
                         cols="30" rows="10" class="form-control">{{  $product_info->product_long_des }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="product_size">Enter Product Size</label>
                        <input type="text" class="form-control" id="product_size" name="product_size" 
                        value="{{ $product_info->product_size }}">
                      </div>
                      <div class="form-group">
                        <label for="quantity">Enter Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" 
                        value="{{ $product_info->quantity }}">
                      </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Update Product</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection