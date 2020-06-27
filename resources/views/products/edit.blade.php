@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row py-5">
                        <div class="col-sm-8"><h2>Editar <b>Producto</b></h2></div>
                        <div class="col-sm-4">
                            <a href="{{url('/home')}}" class="btn btn-primary">Volver Atrás</a>
                        </div>
                    </div>
                </div>
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
                <div class="container my-3">
                    <hr>
                    <form enctype="multipart/form-data" method="post" action="{{ route('products.update', $product->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre del Producto:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $product->nombre }}" />
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion del Producto:</label>
                            <input type="text"  rows="3" class="form-control" name="descripcion" value="{{ $product->descripcion }}" />
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" class="form-control" name="foto" value="{{ $product->foto }}" />
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio del Producto:</label>
                            <input type="text" class="form-control" name="precio" value="{{ $product->precio }}" />
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
