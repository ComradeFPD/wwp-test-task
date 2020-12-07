@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center">Ваша корзина:</h2>
            <div class="col-md-12">
                @if($cart != null && $cart->products->isNotEmpty())
                    <ul>
                    @foreach($cart->products as $product)
                        <li>
                        <div class="col-md-4">
                            <h3>{{ $product->title }}</h3>
                            <p>Цена: {{ $product->discount_price ?? $product->price }}</p>
                            <form action="#" method="post" class="delete-item">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                        </li>
                    @endforeach
                    </ul>
                    <form action="#" method="post" id="destroy-cart">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning">Очистить корзину</button>
                    </form>
                    @else
                    <h2>Ваша корзина пуста :(</h2>
                @endif
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            $('.delete-item').submit(function (e){
                e.preventDefault();
                $.post('{{ route('cart.delete-item') }}', $(this).serialize(), function (response){
                    alert('Продукт успешно удален');
                    document.location.reload();
                })
            })
            $('#destroy-cart').submit(function (e){
                e.preventDefault();
                $.post('{{ route('cart.destroy') }}', $(this).serialize(), function (){
                    alert('Корзина успешно очищена');
                    document.location.href = '/';
                })
            });
        })
    </script>
@endsection
