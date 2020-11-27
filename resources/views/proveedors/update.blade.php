@extends('layouts.app')

@section('content')

<form action="{{ route('prov.update') }}" method="POST">
{!! csrf_field() !!}
<div class="container" style="margin-top: 50px">    
        <div class="row row-cols-3" class="proveedor">
            <div class="col"> <!--primeracolumna-->                         
                <div class="form-group">
                    <label for="proveedor_legajo" class="col-lg-2 control-label">Legajo</label>
                    <div class="col-lg-12">  
                        <input type="hidden" id="proveedor_legajo" class="form-control" name="proveedor_legajo"
                        value= "<?php echo csrf_token(); ?>">                        
                        <input type="numeric" id="proveedor_legajo" class="form-control" name="proveedor_legajo"
                        value= <?php echo $proveedors[0]->proveedor_legajo; ?> readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="calificacion" class="col-lg-2 control-label">DNI</label>
                    <div class="col-lg-12">
                        <input type="numeric" class="form-control" name="dni"
                        placeholder="DNI" value = '<?php echo$proveedors[0]->dni; ?>' >
                    </div>
                </div>
                <div class="form-group">
                    <label for="calificacion" class="col-lg-2 control-label">Calificacion</label>
                    <div class="col-lg-12">
                        <select name="calificacion" name="calificacion">
                            <option value='<?php echo$proveedors[0]->calificacion; ?>' selected>[Seleccionar uno]</option>
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
                        placeholder="Nombre" value = '<?php echo$proveedors[0]->nombre; ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion" class="col-lg-2 control-label">Dirección</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="direccion"
                        placeholder="Direccion" value = '<?php echo$proveedors[0]->direccion; ?>'>
                    </div>
                </div>                                  
            </div>
            <div class="col"> <!--terceracolumna-->                  
                <div class="form-group">
                    <label for="apellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="apellido"
                        placeholder="Apellido" value = '<?php echo$proveedors[0]->apellido; ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-lg-2 control-label">Telefono</label>
                    <div class="col-lg-12">
                        <input type="numeric" class="form-control" name="telefono"
                        placeholder="Telefono" value = '<?php echo$proveedors[0]->telefono; ?>'>
                    </div>
                </div>              
            </div>           
        </div> <!--primerafila-->
        <div class="row">
        <input type = 'submit' value = "Actualizar proveedor" />

<!--        <button type="submit" class="btn btn-dark ml-auto">Guardar</button>-->
        <!--<a href="{{route('prov.update')}}"></a>-->
        </div>
</form>

@endsection