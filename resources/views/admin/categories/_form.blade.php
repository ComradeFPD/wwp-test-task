<form action="{{ $category ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="{{ $category ? 'PUT' : 'POST' }}">
    <div class="form-group">
        <label for="title">Название категории</label>
        <input type="text" class="form-control" id="title" value="{{ $category ? $category->title : '' }}" name="title">
    </div>
    <div class="form-group">
        <label for="discount">Скидка</label>
        <input type="number" min="0" max="100" id="discount" value="{{ $category ? $category->discount : 0 }}" class="form-control"
        name="discount">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
</form>
