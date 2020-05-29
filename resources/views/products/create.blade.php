@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Producto</h1>
    <div class=" row my-3">
        @include('products.form',['product' => $product,'url' => '/products/', 'method' => 'POST'])
    </div>
</div>
@endsection
