<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PublicController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view ('show',['product'=>$product]);
    }
}
