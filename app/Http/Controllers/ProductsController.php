<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;

class ProductsController extends Controller
{
    protected function random_string() {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
        for($i=0; $i<10; $i++) {
           $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view('products.create',["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruta = public_path().'/img/';
        $imagenOriginal = $request->file('foto');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $this->random_string() . '.' .$imagenOriginal->getClientOriginalExtension();
        $imagen->save($ruta . $temp_name, 100);
        $product = new Product;
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->foto = $temp_name;
        $product->precio = $request->precio;
        if($product->save()){
            return redirect('/home');
        }else{
            return view('products.create',["product"=> $product]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view ('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        //return view('products.edit',["product" => $product]);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($request->file('foto')){
            $ruta = public_path().'/img/';
            $imagenOriginal = $request->file('foto');
            $imagen = Image::make($imagenOriginal);
            $temp_name = $this->random_string() . '.' .$imagenOriginal->getClientOriginalExtension();
            $imagen->save($ruta . $temp_name, 100);
        }
        $product->nombre = $request->get('nombre');
        $product->descripcion = $request->get('descripcion');
        if ($temp_name != ""){
            $product->foto = $temp_name;
        }
        $product->precio = $request->get('precio');
        $product->save();

        return redirect("/home")->with('success', 'Producto Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/home')->with('success', 'Producto Borrado!');
    }
}
