@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection



@section('main-content')


<section  id="contenido_principal">

	

<div class="box box-primary box-gris">

     <div class="box-header">
        <h4 class="box-title">Analisis</h4>	 

        <form   action="{{ url('buscar_usuario') }}"  method="post"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<div class="input-group input-group-sm">
					<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
					<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="buscar" >
					</span>

				</div>
						
        </form>


		<div class="margin" id="botones_control">
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario_analisis(1);">Agregar Analisis</a>
              <a href="{{ url("/listado_analisis") }}"  class="btn btn-xs btn-primary" >Listado Analisis</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario_analisis(2);">Areas</a> 
              <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario_analisis(3);" >Clinicas</a>                                 
		</div>

    </div>

<div class="box-body box-white">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
				<thead>
						<tr>    <th>codigo</th>
								<th>Rol</th>
								<th>Nombre</th>
								<th>Email</th>
							    <th>Acción</th>
						</tr>
				</thead>
	    <tbody>

	    @foreach($analisis as $analis)
		<tr role="row" class="odd">
			<td>{{ $analis->id }}</td>
			
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $analis->clave  }}</a></td>

			<td>{{ $analis->area->nombre }}</td>
			<td>
			
			<button type="button" class="btn  btn-default btn-xs" onclick="verinfo_usuario({{  $analis->id }})" ><i class="fa fa-fw fa-edit"></i></button>
			<button type="button"  class="btn  btn-danger btn-xs"  onclick="borrado_usuario({{  $analis->id }});"  ><i class="fa fa-fw fa-remove"></i></button>
			</td>
		</tr>
	    @endforeach



		</tbody>
		</table>

	</div>
</div>




{{ $usuarios->links() }}

@if(count($usuarios)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... no se encontraron resultados para su busqueda...
</label> 

</div>

 </div> 


@endif

</div></section>
@endsection