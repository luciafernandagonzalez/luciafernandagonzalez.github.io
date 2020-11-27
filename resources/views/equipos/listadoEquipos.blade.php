@extends('layouts.app')

@section('content')

<div id="titulo" class="mx-auto" style="width: 400px;"><h3>Equipos</h3></div>
<form action="{{ route('eq.show')}}"class="form-inline" class="GET" style="margin-top: 70px">
  <div class="form-group mb-2">
    <label for="legajo" class="">Codigo</label>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" name="codigo" id="codigo">
  </div>
  <div class="row">
    <button class="btn btn-dark mb-2">Buscar</button>
    <a href="{{ route('eq.show') }}"></a>
  </div>
  
</form>

@if($equipos->count())
<div class="row">
    
        <!--tabla-->
        <table class="table" style="margin-top: 10px">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Codigo</th>
                    <th scope="col" style="text-align: center;">Nombre</th>
                    <th scope="col" style="text-align: center;">Modelo</th>
                    <th scope="col" style="text-align: center;">Fecha Compra</th>    
                    <th scope="col" style="text-align: center;">Venc Garantia</th>
                    <th scope="col" style="text-align: center;">Legajo Proveedor</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($equipos as $item)
                            <tr>
                                <td style="text-align: center;">  {{ $item['equipo_codigo'] }} </td>
                                <td style="text-align: center;">  {{ $item['nombre']}} </td>
                                <td style="text-align: center;">  {{ $item['modelo']}} </td>
                                <td style="text-align: center;">  {{ $item['fechaCompra']}} </td>
                                <td style="text-align: center;">  {{ $item['vencGarantia']}} </td>
                                <td style="text-align: center;">  {{ $item['proveedor_legajo']}} </td>
                            </tr>
                        
                    @endforeach
                </tbody>
            
        </table>
    
</div>
@else
<p>No se han encontrado equipos</p>
@endif

@endsection