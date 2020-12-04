@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-success">Создать новый продукт</a>
        <div class="col-md-12">
            <table class="table table-responsive-lg">
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="row">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Показать</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
