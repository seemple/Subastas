				<div class="main-content">

                    <div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<? echo base_url("backend");?>/socios/listar">Socios</a>
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
                    <form class="form-horizontal" role="form" method="post" action="<? echo base_url("backend");?>/socios/<? echo $data["action"];?>" id="socios_form" enctype="multipart/form-data">
                    <? if ($data["action"]=="update") { ?>
                    <input type="hidden" name="id" value="<? echo ($data["info"][0]["id"]);?>" />
                    <? } ?>


									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Nombre</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[nombre]" id="nombre" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["nombre"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Apellido</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[apellido]" id="apellido" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["apellido"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Email</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[email]" id="email" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["email"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Telefono</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[telefono]" id="telefono" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["telefono"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Website</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[web]" id="web" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["web"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>
                                    
                                    <div class="form-group">
									<input type="hidden" name="datos[descrip]" id="descrip" />
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Breve Rese&ntilde;a</label>
										<div class="col-xs-12 col-sm-9 col-lg-7">
                                        	<div class="clearfix">
                                            <div class="wysiwyg-editor" id="editor1"><? if ($data["action"]=="update") echo ($data["info"][0]["descrip"]);?></div>

                                            </div>
                                            <div class="text-danger"></div>
										</div>
                                        
									</div>

                                    <div class="space-4"></div>
                                    
                                    <div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Imagen/Logo</label>
										<div class="col-xs-12 col-sm-9">
                                        	<div class="clearfix">
											<input type="file" name="userfile" id="userfile" class="col-xs-6 col-lg-6 col-sm-6">
											<? if ($data["action"]=="update") {
												if ($data["info"][0]["imagen"]!=""){
												echo "<a class='btn btn-warning fancy' href='".base_url()."fotos/socios/".$data["info"][0]["imagen"]."'>VER IMAGEN</a>";
												}
											}?></div>
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
                  