@extends('admin.app')

@section('title', 'Products')

@section('content')
<section class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-end align-items-center mb-3">
            <button class="btn btn-primary add-product" id="add-product" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus">Add Product</i></button>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <table id="myTable" class="myTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Qty Stock</th>
                            <th>details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)    
                            <tr>
                                <td><img src="{{ asset('storage/products/'.$product->image) }}" class="rounded" alt="image" style="width: 80px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->prix }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->details || '' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('edit product')    
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-success btn-sm edit-product" id="edit-product" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></a>
                                        @endcan
                                        @can('delete product')    
                                        <form action="{{ route('products.destroy', $product) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Alert add --}}
    @can('create product')     
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.products.create')
                </div>
            </div>
        </div>
    </div>
    @endcan

    {{-- Alert Edit --}}
    @can('edit product')     
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editProduct"></div>
                </div>
            </div>
        </div>
    </div>
    @endcan

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.edit-product', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        console.log(url);
        $('#editProduct').load(url);
        $('#editModal').modal('show');
    });
</script>
@endsection