@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            @include('admin.categories._form', ['category' => $category])
        </div>
    </div>
@endsection
