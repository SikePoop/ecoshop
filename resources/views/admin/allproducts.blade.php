@extends('admin.layouts.template')
@section('pagetitle')
All Product
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>All Product</h4>
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
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Slug</th>
                      <th>Price</th>
                      {{-- <th>Product Short Description</th>
                      <th>Product Long Description</th>
                      <th>Category</th>
                      <th>Sub Category</th> --}}
                      <th>Image</th>
                      <th>Size</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>       
                  </thead>
                  <tbody>
                      @foreach ($products as $product)
                      <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->slug }}</td>
                      <td>{{ $product->product_price }}</td>
                      {{-- <td>{{ $product->product_short_des }}</td>
                      <td>{{ $product->product_long_des }}</td>
                      <td>{{ $product->product_category_name }}</td>
                      <td>{{ $product->product_subcategory_name }}</td> --}}
                      <td>
                        <img style="height:100px" 
                        src="{{ asset($product->product_img) }}" alt="">
                        <a href="{{ route('admin.editproductimg', $product->id) }}" 
                          class="btn btn-primary">Update Image</a>
                      </td>
                      <td>{{ $product->product_size }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>
                        @if($product->status =='active')
                          <div class="badge badge-success">Active</div>
                        
                      @else 
                        <div class="badge badge-danger">Not Active</div>
                      
                      @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.editproduct',$product->id)  }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.deleteproduct') }}" method="POST">
                      @csrf
                      <input type="hidden" value="{{ $product->id }}" name="product_id">
                      <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    @if($product->status =='active')
                      <Form action="{{ route('admin.deactivateproduct') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <input type="submit" value="Deactivate" class="btn btn-danger">
                      </Form>
                    @else
                      <form action="{{ route('admin.activateproduct') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <input type="submit" value="Activate" class="btn btn-primary">
                      </form>
                    @endif
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