@extends ('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">
  <!-- Portfolio Item Heading -->
  <a href="{{url('/products')}}" class="btn btn-outline-primary">Todos los productos</a>
  <h1 class="my-4">{{$product->nombre}}
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-4">
        <img class="img-fluid" src="../img/{{ $product->foto }}" alt="foto del producto" width="250px" height="250px">
    </div>

    <div class="col-md-8">
      <h3 class="my-3"> Descripcion del producto</h3>
      <p>{{$product->descripcion}}</p>
      <h3>Precio</h3>
      <p>{{$product->precio}}</p>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->


@endsection
