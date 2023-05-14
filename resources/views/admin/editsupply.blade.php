@extends('admin.layouts.template')
@section('pagetitle')
Edit Supply
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Edit Supply</h4>
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
            <form action="{{ route('admin.updatesupply') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $supply_info->supply_id }}" name="supply_id">
                    @php
                      $suppliers = App\Models\supplier::latest()->get();
                      $products = App\Models\Product::latest()->get();
                    @endphp
                    <div class="form-group">
                        <label for="supply_name">Select supplier</label>
                        <select name="supplier_id" class="form-control">
                          @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_id }}" @if ($supply_info->supplier_id == $supplier->supplier_id)
                              Selected
                            @endif>{{ $supplier->supplier_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="product_name">Select Product</label>
                        <select name="product_id" class="form-control">
                          @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($supply_info->product_id == $product->id)
                              Selected
                            @endif>{{ $product->product_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="supply_name">Enter Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" 
                        value="{{ $supply_info->quantity }}">
                      </div><div class="form-group">
                        <label for="price">Enter Price</label>
                        <input type="number" class="form-control" id="price" name="price" 
                        value="{{ $supply_info->price }}">
                      </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">Update Supply</button>
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection