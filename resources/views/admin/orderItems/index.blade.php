@extends('admin.app')

@section('title', 'OrderItems')

@section('content')
<section class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <table id="myTable" class="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Order</th>
                            <th>Product</th>
                            <th>qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)    
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->order->id }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->subtotal }} <b>Dh</b></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection