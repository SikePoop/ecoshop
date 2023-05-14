@php
    $suppliers = App\Models\supplier::get();
    $products = App\Models\Product::get();
@endphp
@extends('admin.layouts.template')
@section('pagetitle')
Create Supply
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Create Supply</h4>
            </div>
            <form action="{{ route('admin.storesupply') }}" method="POST">
              @csrf
                <div class="card-body">
                
                    <div class="form-group">
                        <label for="supplier_name">Select supplier</label>
                        <select name="supplier_id" class="form-control">
                          @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_id }}">{{ $supplier->supplier_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="product_name">Select Product</label>
                        <select name="product_id" class="form-control">
                          @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="quantity">Enter Quantity</label>
                        <input type="text" class="form-control" id="quantity" 
                        name="quantity" 
                        >
                      </div>
                      <div class="form-group">
                        <label for="price">Enter Price</label>
                        <input type="text" class="form-control" id="price" 
                        name="price" 
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