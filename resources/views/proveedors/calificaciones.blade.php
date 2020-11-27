@extends('layouts.app')

@section('content')

<div id="titulo" class="mx-auto" style="width: 400px;"><h3>Proveedores: Calificacion</h3></div>
<form action="{{ route('prov.calificaciones')}}"class="form-inline" class="GET" style="margin-top: 70px">
  <div class="form-group mb-2">
    <label for="legajo" style="text-align: center;" class="">Ordenados de mayor calificacion a menor</label>
  </div>
  
  
</form>

@if($proveedors->count())
<div class="row align-items-end" style="margin-top: 50px">    
        <!--tabla-->
        <table class="table" style="margin-top: 10px">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Legajo</th>
                    <th scope="col" style="text-align: center;">Nombre</th>
                    <th scope="col" style="text-align: center;">Apellido</th>
                    <th scope="col" style="text-align: center;">DNI</th>    
                    <th scope="col" style="text-align: center;">Direccion</th>
                    <th scope="col" style="text-align: center;">Telefono</th>
                    <th scope="col" style="text-align: center;">Calificacion</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($proveedors as $item)
                            <tr>
                                <td style="text-align: center;">  {{ $item['proveedor_legajo'] }} </td>
                                <td style="text-align: center;">  {{ $item['nombre']}} </td>
                                <td style="text-align: center;">  {{ $item['apellido']}} </td>
                                <td style="text-align: center;">  {{ $item['dni']}} </td>
                                <td style="text-align: center;">  {{ $item['direccion']}} </td>
                                <td style="text-align: center;">  {{ $item['telefono']}} </td>
                                <td style="text-align: center;">  {{ $item['calificacion']}} </td>
                            </tr>
                        
                    @endforeach
                </tbody>
            
        </table>
    
</div>
@else
<p>No se han encontrado proveedores</p>
@endif

@endsection