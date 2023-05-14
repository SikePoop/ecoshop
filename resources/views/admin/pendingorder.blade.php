@extends('admin.layouts.template')
@section('pagetitle')
Order Manage
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Order Manage</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Shipping Infomation</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->user_id }}</td>
                            <td>
                                <ul>
                                    <li>Phone Number - {{ $order->shipping_phoneNumber }}</li>
                                    <li>Address - {{ $order->address }}</li>
                                    <li>Postal Code - {{ $order->shipping_postalcode }}</li>
                                </ul>
                            </td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                @if($order->status =='done')
                                <Form action="">
                                    <input type="submit" value="Approve" class="btn btn-success" disabled>
                                </Form>
                                @else 
                                <form action="{{ route('approve') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $order->id }}" name="id">
                                    <input type="submit" value="Approve" class="btn btn-success">
                                </form>
                                @endif
                            </td>
                            
                        </tr>
                        @endforeach

                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->user_id }}</td>
                            <td>
                                <ul>
                                    <li>Phone Number - {{ $order->shipping_phoneNumber }}</li>
                                    <li>Address - {{ $order->address }}</li>
                                    <li>Postal Code - {{ $order->shipping_postalcode }}</li>
                                </ul>
                            </td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                @if($order->status =='done')
                                <Form action="">
                                    <input type="button" value="Approved" class="btn btn-secondary" disabled>
                                </Form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection