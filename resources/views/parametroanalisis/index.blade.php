@extends('adminlte::layouts.app')

@section('htmlheader_title')
	  Parametrizacion de analisis 
@endsection

@section('main-content')
 <section>
 	<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-gris">
            <div class="box-header">
              <h3 class="box-title"> {{'Parametrizacion de: '.$analisis->clave}}</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            	<form action="{{route('parametroanalisis.store')}}" method="POST">
            		{{csrf_field()}}
              <table class="table table-hover text-left">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Cantidad</th>
                  <th>Unidad</th>
                  <th>Valores Cuantitativos</th>
                  <th>Valores Cualitativos</th>
                  <th>Opciones</th>
                </tr>
              		<div class="form-group">
                			<input type="hidden" name="analisis_id" value="{{$analisis->id}}">	
                		</div>
                		<tr>
                			<th>#</th>
                		<div class="form-group">
                			<th><input type="name" name="nombre" class="form-control"></th>
                		</div>          		         		             		
	                	<div class="form-group"> 
	                		<th><select  name="tipo" class="form-control">
	                		<option>01</option>
	                		</select></th>
	                	</div>
	                	
	                	<div class="form-group">
	                		
	                		<th><input type="number" name="cant_resultados" class="form-control"></th>
	                	</div>
	                	<div class="form-group"> 
	                	<th><select name="unidad_medida_id" class="form-control" >
	                		@foreach($unidades as $unidad)
	                		<option value="{{$unidad->id}}">{{$unidad->nombre}} - {{$unidad->simbolo}}</option>
	                		@endforeach

	                		</select></th></div>                	
	                	<th></th>
	                	<th></th>
	                	<div class="form-group">
	                		<th><input type="submit" class="btn  btn-success btn-sm" value="Crear parametro"></input></th>
	                	</div>
	                	</tr>
                	
                @foreach($parametros as $parametro)
                	<tr>
                		<td>{{$parametro->id}}</td>
                		<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);"  style="display:block"><i class="fa  fa-eyedropper"></i>&nbsp;&nbsp;{{ $parametro->nombre  }}</a></td>
                		<td>{{$parametro->tipo}}</td>
                		<td>{{$parametro->cant_resultados}}</td>
                		<td>{{$parametro->unidadDeMedida->nombre}}</td>
                		<td>
                			@foreach($parametro->cuantitativos as $cuantitativo)
                			<button type="button" class="btn  btn-default btn-xs" onclick="add_valores({{$cuantitativo->id}})" >{{$cuantitativo->rango_inicial}} - {{$cuantitativo->rango_final}}<i class="fa fa-fw fa-pencil"></i></button>
                			@endforeach
                			<button type="button" class="btn  btn-success btn-xs" onclick="add_valores({{$parametro->id}},true)" ><i class="fa fa-fw fa-plus"></i></button>
                		</td>
                		<td>
                			@foreach($parametro->cualitativos as $cualitativo)
                			<button type="button" class="btn  btn-default btn-xs" onclick="add_valores({{$cualitativo->id}})" >{{$cualitativo->valor}}<i class="fa fa-fw fa-times"></i></button>
                			
                			@endforeach
                			
                			<button type="button" class="btn  btn-success btn-xs" onclick="add_valores({{$parametro->id}},false)" ><i class="fa fa-fw fa-plus"></i></button>
                		</td>
                		<td>
                			<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-pencil"></i> </button>
                			<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-times"></i> </button>
                		</td>
                	</tr>
                @endforeach
              </table>
              </form>	
               
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
 </section>


@endsection