<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $datos['products']=Products::paginate(4);
        return view('products.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $campos=[
       'NameProduct'=>'required|string|max:100',
       'PhotoGraphy'=>'required|max:10000|mimes:jepg,png,jpg'
       ];
       $Mensaje=["required"=>'El :attribute es requerido'];
       $this->validate($request,$campos,$Mensaje);


    //$datosProducts=request()->all();
    $datosProducts=request()->except('_token');
    if($request->hasFile('PhotoGraphy')){
        $datosProducts['PhotoGraphy']=$request->file('PhotoGraphy')->store('uploads','public');
    }
    Products::insert($datosProducts);
    return redirect('productos')->with('Mensaje','Producto Agregado Con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Products::findOrFail($id);
         return view('products.edit',compact('product')
         );



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $campos=[
            'NameProduct'=>'required|string|max:100'
           
            ];
           
            if($request->hasFile('PhotoGraphy')){
                $campos+=[ 'PhotoGraphy'=>'required|max:10000|mimes:jepg,png,jpg'];
            }
            $Mensaje=["required"=>'El :attribute es requerido'];
            $this->validate($request,$campos,$Mensaje);


    $datosProductos=request()->except(['_token','_method']);
    if($request->hasFile('PhotoGraphy')){
        $product= Products::findOrFail($id);
         Storage::delete('public/'.$product->PhotoGraphy);
        $datosProductos['PhotoGraphy']=$request->file('PhotoGraphy')->store('uploads','public');
    }
    
    Products::where('id','=',$id)->update($datosProductos);
    $product= Products::findOrFail($id);
    return redirect('productos')->with('Mensaje','Producto Modificado Con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Products::findOrFail($id);
        if(Storage::delete('public/'.$product->PhotoGraphy)){
            Products::destroy($id);
            
        }


      
        return redirect('productos')->with('Mensaje','Producto Eliminado Con Exito');

    }
}
