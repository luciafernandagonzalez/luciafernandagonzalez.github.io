@extends('layouts.app')

@section('content')

<div class="col-auto mr-auto" class="mx-auto" >
      <form action="{{route('cont.store')}}" class="POST" method="post">
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
            <label for="proveedor_legajo" class="col-sm-2 col-form-label">Tecnico</label>
              <div class="col-sm-10">
                <select type="text" class="custom-select" class="form-control" class="form-control-text" aria-label="Example select with button addon" name="tipo">
                <option selected>Seleccionar</option>
                @foreach($tecnicos as $item)
                <option value="tecnico_legajo"><?= $item['tecnico_legajo'] ?></option>
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
    


@endsection