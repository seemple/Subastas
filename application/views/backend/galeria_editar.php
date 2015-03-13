				<div class="main-content">

                    <div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<? echo base_url("backend");?>/galeria/listar">Galeria de fotos</a>
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
                    <form class="form-horizontal" role="form" method="post" action="<? echo base_url("backend");?>/galeria/<? echo $data["action"];?>" id="galeria_form">
                    <? if ($data["action"]=="update") { ?>
                    <input type="hidden" name="id" value="<? echo ($data["info"][0]["id"]);?>" />
                    <? } ?>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="idSocio">Item relacionado</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<select name="datos[item_id]" id="item_id" class="col-xs-12 col-sm-7" >
                                                <option value="NULL" selected="selected">Seleccione...</option>
												<? foreach ($data["items"] as $item) {
												?>
												<option value="<? echo $item["id"];?>"><? echo ucfirst($item["codigo"]);?></option>
                                            	<? }?>
                                            </select>
											<?
                                            // Selecciono el item que corresponde
											if ($data["action"]=="update") {
														foreach ($data["items"] as $item) {
															if ($item["id"] == $data["info"][0]["item_id"]) { ?>
                                                            
																<script>$("#item_id option[value='<? echo $data["info"][0]["item_id"];?>']").attr('selected', 'selected');</script>			
											<?
															}
														}
											}
											?>
											</div>
                                             <div class="text-danger"></div>
										</div>
									</div>
	
    								<div class="space-4"></div>


									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Nombre</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[nombre]" id="form-input-readonly" readonly="true" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["nombre"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Descripcion</label>
									<input type="hidden" name="datos[descrip]" id="descrip" />
										<div class="col-xs-12 col-sm-7 col-lg-7">
                                        	<div class="clearfix">
                                             <div class="wysiwyg-editor" id="editor1"><? if ($data["action"]=="update") echo ($data["info"][0]["descrip"]);?></div>
</div>
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
                    