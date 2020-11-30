@extends('layouts.app')

@section('content')

<div class="container">
<div id="titulo" class="mx-auto" style="text-align: center;: 400px;"><h3>Tecnicos Autorizados</h3></div>
<form action="{{ route('cont.show')}}" class="form-inline" class="GET" style="margin-top: 70px">

  <div class="form-group mb-2">
    <label for="legajo" class="">Legajo Proveedor</label>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" name="legajo" id="legajo">
  </div>
  <div class="row">
    <button class="btn btn-dark mb-2">Buscar</button>
    <a href="{{ route('cont.show') }}"></a>
  </div>
  
</form>

<div class="container" style="margin-top:70px">
@if($tecnicos->count())
<div class="row row-cols-2 ">
    <div class="col-auto">
        <!--tabla-->
        <table class="table table-hover" style="" name="tabla">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Legajo</th>
                    <th scope="col" style="text-align: center;">Nombre</th>
                    <th scope="col" style="text-align: center;">Apellido</th>
                    <th scope="col" style="text-align: center;">DNI</th>    
                    <th scope="col" style="text-align: center;">Direccion</th>
                    <th scope="col" style="text-align: center;">Telefono</th>
                    <th scope="col" style="text-align: center;">Legajo de proveedor</th>        
                </tr>
            </thead>
                <tbody>
                    @foreach($tecnicos as $item)
                            <tr>                                
                                <td style="text-align: center;">  {{ $item['tecnico_legajo'] }} </td>
                                <td style="text-align: center;">  {{ $item['nombre']}} </td>
                                <td style="text-align: center;">  {{ $item['apellido']}} </td>
                                <td style="text-align: center;">  {{ $item['dni']}} </td>
                                <td style="text-align: center;">  {{ $item['direccion']}} </td>
                                <td style="text-align: center;">  {{ $item['telefono']}} </td>
                                <td style="text-align: center;">  {{ $item['proveedor_legajo']}} </td>
                                
                            </tr>
                        
                    @endforeach
                </tbody>
            
        </table>


        <table class="table table-hover" style="margin-top: 100px">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Codigo control</th>
                    <th scope="col" style="text-align: center;">Tecnico</th>
                    <th scope="col" style="text-align: center;">Tipo</th>
                    <th scope="col" style="text-align: center;">Fecha</th>    
                    <th scope="col" style="text-align: center;">Hora</th> 
              
                </tr>
            </thead>
            <tbody>
                @foreach($controls as $item)
                    <tr>
                        <td style="text-align: center;">  {{ $item['control_codigo'] }} </td>
                        <td style="text-align: center;">  {{ $item['tecnico_legajo']}} </td>
                        <td style="text-align: center;">  {{ $item['tipo']}} </td>
                        <td style="text-align: center;">  {{ $item['fecha']}} </td>
                        <td style="text-align: center;">  {{ $item['hora']}} </td>
                        
                    </tr>
                @endforeach
            </tbody>            
        </table>

    </div>

    <!--SEGUNDA COLUMNA-->
    <div class="col-auto mr-auto" class="mx-auto" >
      <form action="{{ route('cont.store', [$control_codigo]) }}" class="POST" method="post" accept-charset="UTF-8">
      @csrf
      {!! csrf_field() !!}      
        <div class="form-group row" > <!--primera fila-->  
            <label for="control_codigo" class="col-sm-2 col-form-label">Codigo control</label>
            <div class="col-sm-10">
              <input type="numeric" class="form-control" name="control_codigo" id="control_codigo" 
              value= 
              <?php  
                if($controls->count())          
                  $i = count($controls)+1000;            
                else
                  $i = 1000;
              echo $i;
              ?> readonly>
            </div>
        </div>
          <div class="form-group row" > <!--segunda fila-->
            <label for="tecnico_legajo" class="col-sm-2 col-form-label">Tecnico</label>
              <div class="col-sm-10">
                <select type="text" class="custom-select" class="form-control" class="form-control-text" aria-label="Example select with button addon" name="tecnico_legajo">
                <option selected>Seleccionar</option>
                @foreach($tecnicos as $item)
                <option value="{{ $item->tecnico_legajo }}"><?= $item['tecnico_legajo'] ?></option>
                @endforeach
                </select>
    
              </div>
          </div>
          <div class="form-group row "> <!--tercera fila-->
            <label for="inputPassword" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-10">
              <select class="custom-select" class="form-control" class="form-control-text" aria-label="Example select with button addon" name="tipo">
              <option selected>Seleccionar</option>
              <option value="ingreso">Ingreso</option>
              <option value="egreso">Egreso</option>
              </select>
            </div>
          </div>
          <div class="form-group row" ><!--cuarta fila-->
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="fecha" >
            </div>
          </div>
          <div class="form-group row" ><!--quinta fila-->
            <label for="staticEmail" class="col-sm-2 col-form-label">Hora</label>
            <div class="col-sm-10">
              <input type="time" class="form-control" name="hora" >
            </div>
          </div>          
          <div class="row"><!--sexta fila-->
            <button class="btn btn-dark ml-auto">Guardar</button>
            <a href="{{route('cont.store')}}"></a>
          </div>
      </form>  
    </div>    
    
</div>
@else
<p>No se han encontrado tecnicos</p>
@endif
</div>

</div>

@endsection