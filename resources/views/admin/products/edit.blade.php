<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ $product->image }}">
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="enter product name">
        <label for="name">Name</label>
    </div>
    <div class="form-floating mb-3">
      <textarea class="form-control" placeholder="description" value="{{ $product->name }}" name="description" id="description" style="height: 100px;">{{ $product->description }}</textarea>
      <label for="description">Description</label>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Dh</span>
        <input type="number" name="prix" value="{{ $product->prix }}" class="form-control" >
        <span class="input-group-text">.00</span>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="name" name="stock" value="{{ $product->stock }}" placeholder="enter price">
        <label for="name">Qty Stock</label>
    </div>
    <div class="row mb-3">
        <label class="col-sm-4">Category</label>
        <div class="col-sm-8">
          <select class="form-select" name="category_id">
            <option selected>choisire une categorie</option>
            @foreach ($categories as $category)    
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="details" name="details" id="details" style="height: 100px;">{{ $product->details || ''}}</textarea>
        <label for="details">Details</label>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>