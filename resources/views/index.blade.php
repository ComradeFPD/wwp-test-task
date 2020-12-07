@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 row">
                @if($products->isNotEmpty())
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <h3>{{ $product->title }}</h3>
                                    <p>Цена: {{ $product->discount_price ?? $product->price }}</p>
                                    @auth
                                        <form action="#" method="post" class="add-product">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-success">Добавить в корзину</button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                @endif
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            $('.add-product').submit(function (e){
                e.preventDefault();
                $.post('{{ route('cart.add-item') }}', $(this).serialize(), function (response){
                    alert(response.message);
                })
            })
        })
    </script>
@endsection
