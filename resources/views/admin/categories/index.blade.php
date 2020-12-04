@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Создать новую категорию</a>
            </div>
        </div>
        <table class="table table-responsive-lg">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Скидка</th>
                <th>Действия</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->discount ?? 'Нет' }}</td>
                    <td class="row">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Показать</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
