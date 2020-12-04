@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">{{ $category->title }}</h3>
            </div>
            <div class="card-body">
                @if($category->discount)
                    <p>Скидка: {{ $category->discount }}%</p>
                    @else
                    <p>На данную категорию нет скидок.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
