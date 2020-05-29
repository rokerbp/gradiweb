{!! Form::open(['url' => $url, 'method' => $method]) !!}
    <div class="form-group">
        {{ Form::text('nombre',$product->nombre,['class' => 'form-control', 'placeholder'=>'Nombre del Producto...']) }}
    </div>
    <div class="form-group">
        {{ Form::textarea('descripcion',$product->descripcion,['class' => 'form-control', 'placeholder'=>'Descripción del producto...']) }}
    </div>
    <label for="foto" >Foto del producto</label>
    <div class="form-group">
        {{ Form::file('foto',$product->foto,['class' => 'form-control', 'placeholder'=>'Foto del producto...']) }}
    </div>
    <div class="form-group">
        {{ Form::text('precio',$product->precio,['class' => 'form-control', 'placeholder'=>'Precio del producto...']) }}
    </div>
    <div class="form-group text-right">
        <a href="{{url('/home')}}">Regresar al listado de productos</a>
        <input type="submit" value="Enviar" class="btn btn-success">
    </div>
{!! Form::close() !!}
