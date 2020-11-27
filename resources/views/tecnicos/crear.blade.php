@extends('layouts.app')

@section('content')

<div id="titulo" class="mx-auto" style="width: 400px;"><h3>Gestion Tecnicos</h3></div>
<form action="{{ route('tec.store')}}" method="POST">
{!! csrf_field() !!}
<div class="container" style="margin-top: 10px">
    <div class="container">
        <div class="row row-cols-3" class="tecnico">
            <div class="col"> 
            <!--primeracolumna-->           
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="legajo" class="col-lg-2 control-label">Legajo</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="legajo"
                            placeholder="Legajo" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dni" class="col-lg-2 control-label">DNI</label>
                        <div class="col-lg-12">
                            <input type="numeric" class="form-control" name="dni"
                            placeholder="DNI">
                        </div>
                    </div>     
                        
                </div>   
            <div class="col"> 
            <!--segundacolumna-->                           
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
            <div class="col"> 
            <!--terceracolumna-->           
               
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

        <div class="form-group mb-2">
            <label for="legajo" class="">Legajo Proveedor</label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="legajoProveedor">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>  
        <a href="">Tecnicosagregados</a>
        
        <div class="row">
        <button class="btn btn-dark ml-auto">Guardar</button>
        <p>
            <a href="{{route('proveedor.addTecnico', ['legajo' => $proveedor->legajo]) }}"></a>
        </p>
        </div>
</form>

@if($tecnicos->count())
<div class="row row-cols-2 align-items-end">
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
                </tr>
            </thead>
                <tbody>
                    @foreach($tecnicos as $item)
                        <tr>
                            <td style="text-align: center;">  {{ $item['legajo'] }} </td>
                            <td style="text-align: center;">  {{ $item['nombre']}} </td>
                            <td style="text-align: center;">  {{ $item['apellido']}} </td>
                            <td style="text-align: center;">  {{ $item['dni']}} </td>
                            <td style="text-align: center;">  {{ $item['direccion']}} </td>
                            <td style="text-align: center;">  {{ $item['telefono']}} </td>
                        </tr>
                    @endforeach
                </tbody>
            
        </table>
    </div>

        </form>
    </div>
</div>
@else
<p>No se han encontrado usuarios</p>
@endif
    

@endsection

