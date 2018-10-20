
<section >



<div class="row" >


  <div class="box box-primary box-gris">
 
      <div class="box-header with-border my-box-header">
        <h3 class="box-title"><strong>Editar Informacion del Analisis</strong></h3>
      </div><!-- /.box-header -->
      <hr style="border-color:white;" />
      <div id="notificacion_E2" ></div>
      <div class="box-body">
              
        

          <form   action="{{ url('editar_analisis') }}"  method="post" id="f_editar_analisis"  class="formentrada"  >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                <input type="hidden" name="id_analisis" value="{{ $analisis->id }}"> 

          <div class="col-md-6">
              <div class="form-group">
                    <label class="col-sm-2" for="nombres">Nombre*</label>
                    <div class="col-sm-10" >
                      <input type="text" class="form-control" id="nombre" name="nombre"  value="{{ $analisis->nombre }}"  required   >
                       </div>
              </div><!-- /.form-group -->
          </div><!-- /.col -->
                
          <div class="col-md-6">
              <div class="form-group">
                    <label class="col-sm-2" for="claves">Clave*</label>
                    <div class="col-sm-10" >
                    <input type="text" class="form-control" id="clave" name="clave" "  value="{{ $analisis->clave }}" required >
                    </div>
              </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-12">
            <div class="form-group">
            <label class="col-sm-2" for="tipo">Area a asignar*</label>
                <div class="col-sm-6" >         
                  <select id="area1" name="area1" class="form-control">

                           @foreach($areas as $area)
                           <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                           @endforeach
                  </select>    
                </div>
            </div>


          </div>

          <div class="box-footer col-xs-12 box-gris ">
                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
          </div>

          </form>
                    
      </div>
                    
    </div>
  </div>                     
</div>
</section>