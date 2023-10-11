@extends('admin.app')

@section('title', 'Categories')

@section('content')

<section class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Categories</h5>
                <table id="myTable" class=" myTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)    
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('edit category')    
                                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-success btn-sm edit-category" id="edit-category" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></a>
                                        @endcan
                                        @can('delete category')    
                                        <form action="{{ route('categories.destroy', $category) }}" method="post">
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
    @can('create category')    
    <div class="col-md-4 ">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ajouter category</h5>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="enter category name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 100px;"></textarea>
                      <label for="description">Description</label>
                    </div>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    @endcan

    {{-- Alert Edit --}}
    @can('edit category')     
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editModalContent"></div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.edit-category', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        console.log(url);
        $('#editModalContent').load(url);
        $('#editModal').modal('show');
    });
</script>

@endsection
