@role('admin')
<section class="content" >

 <div class="col-md-12">

  <div class="box box-primary  box-gris">
 
    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong>Nuevo Analisis</strong></h3>
    </div><!-- /.box-header -->
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <hr style="border-color:white;" />
 
    <div class="box-body">
              
      <form   action="{{ url('crear_analisis') }}"  method="post" id="f_crear_analisis" class="formentrada" >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

          <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2" for="nombre">Nombres*</label>
                    <div class="col-sm-10" >
                      <input type="text" class="form-control" id="nombres" name="nombres"  required   >
                       </div>
                  </div><!-- /.form-group -->

           

          </div><!-- /.col -->

                
        <div class="col-md-6">
                  <div class="form-group">
									  <label class="col-sm-2" for="apellido">Apellido*</label>
                    <div class="col-sm-10" >
										<input type="text" class="form-control" id="apellidos" name="apellidos" " required >
                    </div>
									</div><!-- /.form-group -->

				</div><!-- /.col -->

        <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-2" for="celular">Telefono*</label>
                       
                       <div class="col-sm-10" >
                        <input type="text" class="form-control" id="telefono" name="telefono" required >
                       </div>

                      </div><!-- /.form-group -->

        </div><!-- /.col -->

        
        <div class="box-header with-border my-box-header col-md-12" style="margin-bottom:15px;margin-top: 15px;">
                    <h3 class="box-title">Datos de acceso</h3>
        </div>
       

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2" for="email">eMail*</label>
                    <div class="col-sm-10" >
                    <input type="email" class="form-control" id="email" name="email"  required >
                    </div>

                    </div><!-- /.form-group -->

                  </div><!-- /.col -->

                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2" for="email">Password*</label>
                    <div class="col-sm-10" >
                    <input type="password" class="form-control" id="password" name="password"  required >
                    </div>

                    </div><!-- /.form-group -->

                  </div><!-- /.col -->


            



                    <div class="box-footer col-xs-12 box-gris ">
                                        <button type="submit" class="btn btn-primary">Crear Nuevo Analisis</button>
                    </div>


                   </form>
                    
                    </div>
                    
                    </div>
                       
                    </div>
</section>

@else
    </br><div class="rechazado"><label style='color:#C22612'>No tiene Permisos para acceder a esta sección</label></div>
@endrole