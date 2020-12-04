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
                                        <a id="add-item" href="{{ route('cart.add-item') }}"
                                           data-id="{{ $product->id }}" class="btn btn-success">Добавить в корзину</a>
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
            $('#add-item').click(function (e){
                e.preventDefault();
                let fd = new FormData();
                fd.append('product_id', $(this).data('id'));
                $.post('{{ route('cart.add-item') }}', fd, function (response){
                    alert(response.message);
                })
            })
        })
    </script>
@endsection
