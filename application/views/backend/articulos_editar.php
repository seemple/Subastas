				<div class="main-content">

                    <div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<? echo base_url("backend");?>/articulos/listar">Articulos</a>
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
                    <form class="form-horizontal" role="form" method="post" action="<? echo base_url("backend");?>/articulos/<? echo $data["action"];?>" id="articulos_form" enctype="multipart/form-data">
                    <? if ($data["action"]=="update") { ?>
                    <input type="hidden" name="id" value="<? echo ($data["info"][0]["id"]);?>" />
                    <? } ?>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Titulo</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[title]" id="title" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["title"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>


									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Copete</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[deck]" id="deck" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["deck"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Seccion</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
											<select name="datos[seccion]" id="seccion" class="col-xs-12 col-sm-7" >
												<option value="<? echo $data["info"][0]["seccion"];?>" selected="selected"><? echo $data["info"][0]["seccion"];?></option>
                                                <option value="novedades">Novedades</option>
                                                <option value="recursos">Recursos</option>
                                                <option value="capacitacion">Capacitacion</option>
                                            </select>
                                            </div>
                                            <div class="text-danger"></div>
                                         </div>
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Fecha</label>

										<div class="col-xs-12 col-sm-5">
                                        
                                        <div class="input-group">
										<input class="form-control input-mask-date" value="<? if ($data["action"]=="update") echo ($data["info"][0]["created_at"]);?>" name="datos[created_at]" type="text" id="form-field-mask-1" />
                                            <span class="input-group-addon">
                                                <i class="icon-calendar bigger-110"></i>
                                            </span>

                                        </div>
                                        
										<div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Fuente / Mas info</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[link]" id="link" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["link"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>

									<div class="form-group">
                                    
										<label class="col-sm-3 control-label no-padding-right" for="titulo">Video Youtube</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
                                            <input type="text" name="datos[youtube]" id="youtube" class="col-xs-12 col-sm-7" value="<? if ($data["action"]=="update") echo ($data["info"][0]["youtube"]);?>"></div>
                                            <div class="text-danger"></div>
                                        </div>
									
                                    </div>

                                    <div class="space-4"></div>
                                    
                                    <div class="form-group">
									<input type="hidden" name="datos[note]" id="descrip" />
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Cuerpo de la nota</label>
										<div class="col-xs-12 col-sm-9 col-lg-7">
                                        	<div class="clearfix">
                                            <div class="wysiwyg-editor" id="editor1"><? if ($data["action"]=="update") echo ($data["info"][0]["note"]);?></div>

                                            </div>
                                            <div class="text-danger"></div>
										</div>
                                        
									</div>

                                    <div class="space-4"></div>
                                    
                                    <div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Imagen</label>
										<div class="col-xs-12 col-sm-9">
                                        	<div class="clearfix">
											<input type="file" name="userfile" id="userfile" class="col-xs-6 col-lg-3 col-sm-6">
											<? if ($data["action"]=="update") {
												if ($data["info"][0]["photo"]!=""){
												echo "<a class='btn btn-warning fancy' href='".base_url()."fotos/articulos/".$data["info"][0]["photo"]."'>VER IMAGEN</a>";
												}
											}?></div>
                                            <div class="text-danger"></div>
										</div>
                                        
									</div>
                                    
                                    <div class="space-4"></div>
                                    
                                    <div class="form-group">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Archivo Adjunto</label>
										<div class="col-xs-12 col-sm-9">
                                        	<div class="clearfix">
											<input type="file" name="adjunto" id="adjunto" class="col-xs-6 col-lg-3 col-sm-6">
											<? if ($data["action"]=="update") {
												if ($data["info"][0]["adjunto"]!=""){
												echo "<a class='btn btn-warning fancy' target='_blank' href='".base_url()."descargas/".$data["info"][0]["adjunto"]."'>VER ADJUNTO</a>";
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
                  