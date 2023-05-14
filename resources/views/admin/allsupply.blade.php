@extends('admin.layouts.template')
@section('pagetitle')
All Supply
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>All Supply</h4>
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
                      <th>Supplier Name</th>
                      <th>Product</th>
                      <th>Quantity</th>
                        <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($supplys as $supply)
                      @php
                            $supplier_name = App\Models\supplier::where('supplier_id',$supply->supplier_id)->get()->value('supplier_name');
                            $product_name = App\Models\Product::where('id',$supply->product_id)->get()->value('product_name');
                        @endphp
                      <tr>
                      <td>{{ $supply->supply_id }}</td>
                      <td>{{ $supplier_name }}</td>
                      
                      <td>{{ $product_name }}</td>
                      <td>{{ $supply->quantity }}</td>
                      <td>{{ $supply->price }}</td>
                      <td>
                        <a href="{{ route('admin.editsupply',$supply->supply_id)  }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.deletesupply',$supply->supply_id) }}" class="btn btn-danger">Delete</a>
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