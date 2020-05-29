@extends ('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">
  <!-- Portfolio Item Heading -->
  <h1 class="my-4">{{$product->nombre}}
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-4">
      <h3 class="my-3"> Descripcion del producto</h3>
      <p>{{$product->descripcion}}</p>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->


@endsection
