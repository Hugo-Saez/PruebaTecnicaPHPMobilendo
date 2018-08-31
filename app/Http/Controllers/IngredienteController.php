<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ingredientes=Ingrediente::orderBy('id')->paginate(2);
      return view('ingrediente.index',compact('ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('ingrediente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[ 'nombre'=>'required', 'precio'=>'required']);
      Ingrediente::create($request->all());
      return redirect()->route('ingrediente')->with('success','Registro creado correctamente');
  }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ingredientes=Ingrediente::find($id);
      return  view('ingrediente.show',compact('ingredientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ingrediente=Ingrediente::find($id);
      return view('ingrediente.edit',compact('ingrediente'));
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
      $this->validate($request,[ 'nombre'=>'required', 'precio'=>'required']);
      Ingrediente::find($id)->update($request->all());
      return redirect()->route('ingrediente')->with('success','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Ingrediente::find($id)->delete();
      return redirect()->route('ingrediente')->with('success','Registro eliminado correctamente');
    }

}
