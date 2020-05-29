@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar un producto</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('products.update', $product->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" name="nombre" value={{ $product->nombre }} />
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion del Producto:</label>
                <input type="text" class="form-control" name="descripcion" value={{ $product->descripcion }} />
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" name="foto" value={{ $product->foto }} />
            </div>

            <div class="form-group">
                <label for="precio">Precio del Producto:</label>
                <input type="text" class="form-control" name="precio" value={{ $product->precio }} />
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
