@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><a href="{{url('/products/create')}}" class="btn btn-primary">Nuevo producto</a></p>
                    Productos
                </div>
                @if(session()->get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    </div>
                @endif

                <div><table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td><a href="{{ route('products.show',$p->id)}}">{{$p->nombre}}</a></td>
                        <td>
                            <a href="{{ route('products.edit',$p->id)}}" class="btn btn-warning">Editar</a>
                            @include('products.delete', ['product' => $p])
                            <td>
                    </tr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
