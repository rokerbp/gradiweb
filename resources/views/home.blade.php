@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row py-5">
                        <div class="col-sm-8"><h2>Productos <b>Tienda</b></h2></div>
                        <div class="col-sm-4">
                            <a href="{{url('/products/create')}}" class="btn btn-outline-success">Nuevo producto</a>
                        </div>
                    </div>
                </div>
                @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="container table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody >
                            @foreach ($products as $p)
                            <tr>
                                <th scope="row">
                                    {{$p->id}}
                                </th>
                                <td>
                                    <a href="{{ route('products.show',$p->id)}}">{{$p->nombre}}</a>
                                </td>
                                <td class="column-verticallineMiddle form-inline">
                                    <a href="{{ route('products.edit',$p->id)}}" class="btn btn-outline-info">Editar</a>
                                    @include('products.delete', ['product' => $p])
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
