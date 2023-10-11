@extends('admin.app')

@section('title', 'Orders')

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
                            <th>Date</th>
                            <th>Payment method</th>
                            <th>adresse</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)    
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->payment }}</td>
                                <td>{{ $order->adresse }}</td>
                                <td>{{ $order->number }}</td>
                                <td>{{ $order->email }}</td>
                                <td>
                                    @can('edit order')    
                                    <form action="{{ route('orders.update', $order) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-outline-{{ $order->status == 0 ? 'danger' : 'success' }}">
                                            <input type="number" name="status" value="{{ $order->status }}" hidden>
                                            {{ $order->status == 0 ? 'en cours' : 'livrée' }}
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection