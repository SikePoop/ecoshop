@extends('admin.layouts.template')
@section('pagetitle')
Add Product
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Add Product</h4>
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
            <form action="{{ route('admin.storeproducts') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="product_name">Enter Product Name</label>
                      <input type="text" class="form-control" id="product_name" name="product_name" 
                      placeholder="Áo polo">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Enter Product Price</label>
                        <input type="text" class="form-control" id="product_price" name="product_price">
                      </div>
                      <div class="form-group">
                        <label for="product_short_des">Enter Product Short Description</label>
                        <textarea name="product_short_des" id="product_short_des"
                         cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="product_long_des">Enter Product Long Description</label>
                        <textarea name="product_long_des" id="product_long_des"
                         cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="product_img">Enter Product Image</label>
                        <input type="file" class="form-control" id="product_img" name="product_img">
                      </div>
                      <livewire:categorysubcategorydropdown />
                      <div class="form-group">
                        <label for="product_size">Enter Product Size</label>
                        <input type="text" class="form-control" id="product_size" name="product_size" 
                        placeholder="XXL">
                      </div>
                      <div class="form-group">
                        <label for="quantity">Enter Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" 
                        placeholder="3">
                      </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Add Product</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection