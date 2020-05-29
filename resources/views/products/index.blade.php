@extends ('layouts.app')

@section('content')
<div class="big-padding text-center indigo white-text">
    <h1>Productos</h1>
</div>

@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
@endif
<div class="container">
    <a href="{{url('/products/create')}}" class="btn btn-primary">Nuevo producto</a>
    <table class="table table-bordered">
        <thead class="blue white-text">
            <tr>
                <td>Nombre</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td><a href="{{ route('products.show',$product->id)}}">{{ $product->nombre }}</a></td>
                <td>
                <a href="{{ route('products.edit',$product->id)}}" class="btn btn-warning">Editar</a>
                @include('products.delete', ['product' => $product])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

