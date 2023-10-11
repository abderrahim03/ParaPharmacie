<form action="{{ route('categories.update', $category) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-floating mb-3">
      <input type="text" class="form-control" value="{{ $category->name }}" id="name" name="name" placeholder="enter category name">
      <label for="name">Name</label>
  </div>
  <div class="form-floating mb-3">
    <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 100px;">{{ $category->description }}</textarea>
    <label for="description">Description</label>
  </div>
  <button type="submit" class="btn btn-success">Enregistrer</button>
</form>