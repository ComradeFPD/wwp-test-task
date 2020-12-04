<form action="{{ $product ? route('products.update', $product->id) : route('products.store') }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="{{ $product ? 'PUT' : 'POST' }}">
    <div class="form-group">
        <label for="title">Название продукта</label>
        <input class="form-control" type="text" id="title" name="title" value="{{ $product ? $product->title : '' }}">
    </div>
    <div class="form-group">
        <label  for="price">Цена</label>
        <input class="form-control" type="number" id="price" name="price" value="{{ $product ? $product->price : '' }}" >
    </div>
    <div class="form-group">
        <select name="categories[]" id="categories" multiple class="custom-select-lg form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
</form>
