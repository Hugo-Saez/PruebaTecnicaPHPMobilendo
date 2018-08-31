@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Ingredientes</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('ingrediente.create') }}" class="btn btn-info" >Añadir Ingrediente</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th>Precio</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($ingredientes->count())
              @foreach($ingredientes as $ingrediente)
              <tr>
                <td>{{$ingrediente->id}}</td>
                <td>{{$ingrediente->nombre}}</td>
                <td>{{$ingrediente->precio}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('IngredienteController@edit', $ingrediente->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('IngredienteController@destroy', $ingrediente->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $ingredientes->links() }}
    </div>
  </div>
</section>

@endsection
