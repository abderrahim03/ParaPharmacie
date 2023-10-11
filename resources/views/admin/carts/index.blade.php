@extends('admin.app')

@section('title', 'Carts')

@section('content')
<section class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Carts</h5>
                <table id="myTable" class="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)    
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>{{ $cart->user->name }}</td>
                                <td>{{ $cart->product->name }}</td>
                                <td>{{ $cart->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection