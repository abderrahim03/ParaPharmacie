@extends('admin.app')

@section('title', 'Reviews')

@section('content')
<section class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Reviews</h5>
                <table id="myTable" class="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Review</th>
                            <th>Rating</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)    
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->product->name }}</td>
                                <td>{{ $review->review }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection