@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3> {{ $product->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="card-group">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="Картинка продукта">
                        @else
                        <p>У продукта нет картинки</p>
                    @endif
                    </div>
                    <div class="card-group">
                        <p>Категории: </p>
                        <ul>
                        @foreach($product->categories as $category)
                            <li>{{ $category->title }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
