@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center">Ваша корзина:</h2>
            <div class="col-md-12">
                @if($cart->products->isNotEmpty())
                    @foreach($cart->products as $product)
                        <div class="col-md-4">
                            <h3>{{ $product->title }}</h3>
                            <p>Цена: {{ $product->discount_price ?? $product->price }}</p>
                            <a href="{{ route('cart/delete-item', ['id' => $product->id ]) }}"
                               data-id="{{ $product->id }}" id="delete-item" class="btn btn-danger">Удалить из корзины</a>
                        </div>
                    @endforeach
                        <a href="{{ route('cart.destroy') }}" class="btn btn-info">Очистить корзину</a>
                    @else
                    <h2>Ваша корзина пуста :(</h2>
                @endif
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            $('#delete-item').click(function (e){
                e.preventDefault();
                let fd = new FormData();
                fd.append('product_id', $(this).data('id'));
                $.post('{{ route('cart.delete-item') }}', fd, function (response){
                    alert(response.message);
                })
            })
        })
    </script>
@endsection
