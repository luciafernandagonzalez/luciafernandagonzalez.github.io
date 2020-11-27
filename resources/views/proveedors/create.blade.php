@extends('layouts.app')

@section('content')

<div id="titulo" class="mx-auto" style="width: 400px;"><h3>Gestion Proveedores</h3></div>
<form action="{{ route('prov.store')}}" method="POST">
{!! csrf_field() !!}
<div class="container" style="margin-top: 50px">    
        <div class="row row-cols-3" class="proveedor">
            <div class="col"> <!--primeracolumna-->                 
                <div class="form-group">
                    <label for="proveedor_legajo" class="col-lg-2 control-label">Legajo</label>
                    <div class="col-lg-12">
                        <input type="numeric" id="proveedor_legajo" class="form-control" name="proveedor_legajo"
                        value= <?php 
                        if($proveedors->count()){       
                        $cant = count($proveedors) +100;
                        }
                        else{
                        $cant = 100;}
                        echo $cant;
                        ?> readonly> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="dni" class="col-lg-2 control-label">DNI</label>
                    <div class="col-lg-12">
                        <input type="numeric" class="form-control" name="dni"
                        placeholder="DNI">
                    </div>
                </div>
                <div class="form-group">
                    <label for="calificacion" class="col-lg-2 control-label">Calificacion</label>
                    <div class="col-lg-12">
                        <select name="calificacion" name="calificacion">
                            <option value="" selected>[Seleccionar uno]</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                     </div>
                </div>                               
            </div>
            <div class="col"> <!--segundacolumna-->                                       
                <div class="form-group">
                    <label for="nombre" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="nombre"
                        placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion" class="col-lg-2 control-label">Dirección</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="direccion"
                        placeholder="Direccion">
                    </div>
                </div>                                  
            </div>
            <div class="col"> <!--terceracolumna-->                  
                <div class="form-group">
                    <label for="apellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="apellido"
                        placeholder="Apellido">
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-lg-2 control-label">Telefono</label>
                    <div class="col-lg-12">
                        <input type="numeric" class="form-control" name="telefono"
                        placeholder="Telefono">
                    </div>
                </div>              
            </div>           
        </div> <!--primerafila-->
        <div class="row">
        <button class="btn btn-dark ml-auto">Guardar</button>
        <a href="{{route('prov.store')}}"></a>
        </div>
</form>

<!--queda solo un container a cerrar-->

<form method="POST" action="proveedors/update" action="update" class="">
{!! csrf_field() !!}
@if($proveedors->count())
<div class="row align-items-end">
    <div class="col-auto mr-auto">
        <!--tabla-->
        <table class="table" style="margin-top: 10px">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 5%">Legajo</th>
                    <th scope="col" style="width: 20%">Nombre</th>
                    <th scope="col" style="width: 20%">Apellido</th>
                    <th scope="col" style="width: 15%">DNI</th>    
                    <th scope="col" style="width: 20%">Direccion</th>
                    <th scope="col" style="width: 15%">Telefono</th>
                    <th scope="col" style="width: 5%">Calificacion</th>
                    <th scope="col" style="width: 5%"></th>  
                    <th class="col" style="width: 5%"></th>  
                </tr>
            </thead>
            <tbody role="form">
                @foreach($proveedors as $item)
                    <tr>
                        <td style="text-align: center;">  {{ $item['proveedor_legajo'] }} </td>
                        <td style="text-align: center;">  {{ $item['nombre']}} </td>
                        <td style="text-align: center;">  {{ $item['apellido']}} </td>
                        <td style="text-align: center;">  {{ $item['dni']}} </td>
                        <td style="text-align: center;">  {{ $item['direccion']}} </td>
                        <td style="text-align: center;">  {{ $item['telefono']}} </td>
                        <td style="text-align: center;">  {{ $item['calificacion']}} </td>
                        <td class="text-align: center;">
                            <a href = 'prov/update/{{ $item->proveedor_legajo }}'>Modificar</a>
                        </td>
                        <td class="text-align: center;">
                            <a href="{{ route('prov.delete', ['proveedor_legajo' => $item->proveedor_legajo])}}">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>
@else
<p>No se han encontrado usuarios</p>
@endif
</form>

<html>
<?php  



?>

</html>

</div>   

@endsection

