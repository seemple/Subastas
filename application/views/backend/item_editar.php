				<div class="main-content">

                    <div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<? echo base_url("backend");?>/item/listar">Home</a>
							</li>
							<li class="active"><? echo $data["titulo"];?></li>
						</ul><!-- .breadcrumb -->
						<!--
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Buscar ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div> #nav-search -->
					</div><!-- #breadcrumb -->

					<div class="page-content">
						<div class="page-header">
							<h1>
								<? echo $data["titulo"];?> 
							</h1>
						</div><!-- /.page-header -->
                    
                    <div class="row">
                    
                    <div class="col-xs-12">
                    <form class="form-horizontal" role="form" method="post" action="<? echo base_url("backend");?>/item/<? echo $data["action"];?>" id="item_form" enctype="multipart/form-data">
                    <? if ($data["action"]=="update") { ?>
                    <input type="hidden" name="id" value="<? echo ($data["info"][0]["id"]);?>" />
                    <? } ?>
									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Destacar operacion? (1=SI / 2=NO)</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            
                                            <select name="datos[destacado]" class="col-xs-12 col-sm-7">
                                            <? if ($data["action"]=="update") {?>
                                            <option value="<? echo ($data["info"][0]["destacado"]);?>" selected="selected"><? echo ($data["info"][0]["destacado"]);?></option>                                          
                                            <? }?>
                                            <option value="1">1</option>                                          
                                            <option value="2">2</option>                                          
                                            </select>
                                            </div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

									<div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Titulo</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[titulo]" id="titulo" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["titulo"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="codigo">Codigo de Operacion</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[codigo]" id="form-input-readonly" readonly="true" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") { echo ($data["info"][0]["codigo"]);} else { echo create_code(); }?>"></div>
                                        <div class="text-danger"></div>

										</div>
									</div>

                                   
                                    <div class="space-4"></div>

									<div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Caracteristicas Destacadas</label>
										<div class="col-xs-12 col-sm-7 col-lg-7">
                                        	<div class="clearfix">
											<textarea name="datos[descrip_2]" class="form-control" rows="2"><? if ($data["action"]=="update") echo ($data["info"][0]["descrip_2"]);?></textarea>
                                            </div>
                                            <div class="text-danger"></div>
										</div>
                                        
									</div>


                                    <div class="space-4"></div>

									<div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Descripcion</label>
										<input type="hidden" name="datos[descrip]" id="descrip" />
										<div class="col-xs-12 col-sm-7 col-lg-7">
                                        	<div class="clearfix">
											<div class="wysiwyg-editor" id="editor1"><? if ($data["action"]=="update") echo ($data["info"][0]["descrip"]);?></div></div>
                                            <div class="text-danger"></div>
										</div>
                                        
									</div>

									<div class="space-4"></div>

									<div class="form-group">
                                    
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-mask-1">Fecha</label>
                                        <div class="col-xs-12 col-sm-5">
                                        <div class="input-group">
										<input class="form-control input-mask-date" value="<? if ($data["action"]=="update") echo ($data["info"][0]["fecha"]);?>" name="datos[fecha]" type="text" id="form-field-mask-1" />
                                            <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                            </span>

                                        </div>
                                        
										<div class="text-danger"></div>
										</div>

                                    </div>

									<div class="space-4"></div>

									<div class="form-group">
                                    
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-mask-1">Horario del remate</label>
                                        <div class="col-xs-12 col-sm-5">
                                        <div class="input-group">
										<input class="form-control" value="<? if ($data["action"]=="update") echo ($data["info"][0]["horario"]);?>" name="datos[horario]" type="text" />
                                        </div>
                                        
										<div class="text-danger"></div>
										</div>

                                    </div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Direccion del remate</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<input type="text" name="datos[dire_remate]" value="<? if ($data["action"]=="update") echo ($data["info"][0]["dire_remate"]);?>" class="wcol-xs-12 col-sm-7">
											</div>
											<div class="text-danger"></div>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
                                    
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-mask-1">Ambientes</label>
                                        <div class="col-xs-12 col-sm-5">
                                        <div class="input-group">
										<input class="form-control" value="<? if ($data["action"]=="update") echo ($data["info"][0]["ambientes"]);?>" name="datos[ambientes]" type="text" />
                                        </div>
                                        
										<div class="text-danger"></div>
										</div>

                                    </div>

									<div class="space-4"></div>

									<div class="form-group">
                                    
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-mask-1">Superficie</label>
                                        <div class="col-xs-12 col-sm-5">
                                        <div class="input-group">
										<input class="form-control" value="<? if ($data["action"]=="update") echo ($data["info"][0]["superficie"]);?>" name="datos[superficie]" type="text" />
                                        </div>
                                        
										<div class="text-danger"></div>
										</div>

                                    </div>

    								<div class="space-4"></div>
                                    
                                    <div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Edicto</label>
										<div class="col-xs-12 col-sm-9">
                                        	<div class="clearfix">
											<input type="file" name="link_edicto" id="link_edicto" class="col-xs-6 col-lg-3 col-sm-6">
											<? if ($data["action"]=="update") {
												if ($data["info"][0]["link_edicto"]!=""){
												echo "<a class='btn btn-warning fancy' target='_blank' href='".base_url()."descargas/".$data["info"][0]["link_edicto"]."'>VER EDICTO</a>";
												}
											}?></div>
                                            <div class="text-danger"></div>
										</div>
                                        
									</div>

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="codigo">Link al PJN</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[juzgado]" id="" placeholder="Ingrese Nº de Juzgado" class="col-lg-2 col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") { echo ($data["info"][0]["juzgado"]);} ?>">

                                            <input type="text" name="datos[expediente]" id="" placeholder="Ingrese Nro. de Expendiente" class="col-lg-3 col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") { echo ($data["info"][0]["expediente"]);} ?>">
                                            
                                            <input type="text" name="datos[ano]" id="" placeholder="Ingrese A&ntilde;o del expediente" class="col-lg-3 col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") { echo ($data["info"][0]["ano"]);} ?>">

                                            </div>
                                        <div class="text-danger"></div>

										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="precio">Precio / Base</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<input type="text" name="datos[precio]" value="<? if ($data["action"]=="update") echo ($data["info"][0]["precio"]);?>" id="precio" class="col-xs-12 col-sm-7"></div>
                                            <div class="text-danger"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Direccion</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<input type="text" name="datos[direccion]" value="<? if ($data["action"]=="update") echo ($data["info"][0]["direccion"]);?>" id="direccion" class="wcol-xs-12 col-sm-7">
											</div>
											<div class="text-danger"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="ciudad">Localidad/Barrio</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<input type="text" name="datos[ciudad]" value="<? if ($data["action"]=="update") echo ($data["info"][0]["ciudad"]);?>" id="ciudad" class="col-xs-12 col-sm-7">
											</div>
                                            <div class="text-danger"></div>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="provincia">Provincia</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<select name="datos[provincia]" id="provincia" class="col-xs-12 col-sm-7">
					
                    <option value="<? echo ($data["info"][0]["provincia"]);?>" selected="selected"><? echo ($data["info"][0]["provincia"]);?></option>

                    <option>Capital Federal</option>
		            
		            <option>Buenos Aires</option>
		            
		            <option>Gran Buenos Aires</option>
		            		            
		            <option>Catamarca</option>
		            
		            <option>Chaco</option>
		            
		            <option>Chubut</option>
		            
		            <option>C&oacute;rdoba</option>
		            
		            <option>Corrientes</option>
		            
		            <option>Entre R&iacute;os</option>
		            
		            <option>Formosa</option>
		            
		            <option>Jujuy</option>
		            
		            <option>La Pampa</option>
		            
		            <option>La Rioja</option>
		            
		            <option>Mendoza</option>
		            
		            <option>Misiones</option>
		            
		            <option>Neuqu&eacute;n</option>
		            
		            <option>R&iacute;o Negro</option>
		            
		            <option>Salta</option>
		            
		            <option>San Juan</option>
		            
		            <option>San Luis</option>
		            
		            <option>Santa Cruz</option>
		            
		            <option>Santa Fe</option>
		            
		            <option>Santiago Del Estero</option>
		            
		            <option>Tierra Del Fuego</option>
		            
		            <option>Tucum&aacute;n</option>
                    
                    </select>
											</div>
											<div class="text-danger"></div>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="tipo">Tipo</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<select name="datos[tipo]" id="tipo" class="col-xs-12 col-sm-7">
                                                <option value="<? echo ($data["info"][0]["tipo"]);?>" selected="selected"><? echo ($data["info"][0]["tipo"]);?></option>
                                                <option value="Remate">Remate</option>
                                                <option value="Alquiler">Alquiler</option>
                                                <option value="Venta">Venta</option>
                                            </select>
											</div>
                                            <div class="text-danger"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="categorias">Categoria</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<select name="datos[categoria]" id="categorias" class="col-xs-12 col-sm-7" >
                                                <? foreach ($data["categorias"] as $item) {
												?>
												<option value="<? echo $item["id"];?>"><? echo ucfirst($item["nombre"]);?></option>
                                            	<? }?>
                                            </select>
											<?
                                            // Selecciono el item que corresponde
											if ($data["action"]=="update") {
														foreach ($data["categorias"] as $item) {
															if ($item["id"] == $data["info"][0]["categoria"]) { ?>
                                                            
																<script>$("#categorias option[value='<? echo $data["info"][0]["categoria"];?>']").attr('selected', 'selected');</script>			
											<?
															}
														}
											}
											?> 

											</div><div class="text-danger"></div>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="subcategoria">Subcategoria</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                                <select name="datos[sub]" id="subcategoria" class="col-xs-12 col-sm-7">
                                                </select>
											</div>
											<div class="text-danger"></div>
										</div>
									</div>

                                    <div class="clearfix form-actions">
                                    
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												ENVIAR
											</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												BORRAR
											</button>
										</div>
									</div>
                                    
                                    </form>
                    
                    </div>
                    
                    </div>					
                    
                    </div>
                    
               
<script type="text/javascript">

<? if ($data["action"]=="update") { ?>

			$.post("<? echo base_url();?>/backend/item/subcategorias", { padre:null, subcate: <? echo $data["info"][0]["sub"];?> }, function(result){
			
				$.each(result, function(i,item) {
					
					$("<option value='"+item["id"]+"'>"+item["nombre"]+"</option>").appendTo("#subcategoria");
																
				});
				
			}, "json")

<? } ?>

$(document).ready(function(){

	$('#categorias').change(function(e) {

			cate = $("#categorias option:selected").val();
			
			$('#subcategoria').find('option').remove();
			
			$.post("<? echo base_url();?>/backend/item/subcategorias", { padre:cate}, function(result){
			
				$.each(result, function(i,item) {
					
					$("<option value='"+item["id"]+"'>"+item["nombre"]+"</option>").appendTo("#subcategoria");
																
				});
				
			}, "json")
	
	});

});
</script>