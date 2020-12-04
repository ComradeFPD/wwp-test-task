@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            @include('admin.products._form', ['product' => null])
        </div>
    </div>
@endsection
