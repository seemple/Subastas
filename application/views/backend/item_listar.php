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

						<!--<div class="nav-search" id="nav-search">
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
					<input id="gritter-light" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Tipo</th>
														<th>Codigo</th>
														<th>Titulo</th>
														<th>Fecha</th>
														<th>Ciudad/Barrio</th>
														<th>Categoria</th>
														<th></th>
													</tr>
												</thead>
	
    											<? $label=""; foreach ($data["info"] as $item) { 

												$equal = array ("id"=>$item["categoria"]);
												$categoria = get_string("categorias",NULL,$equal);

												$equal = array ("item_id"=>$item["id"]);
												$album = get_string("albumes",NULL,$equal);
												
												switch ($item["tipo"]) {
												
													case "Alquiler":
													$label ="warning";
													break;
													
													case "Venta":
													$label="success";
													break;
													
													case "Remate":
													$label="info";
												
												}
												
												?>
                                                
													<tr>
														<td class="hidden-480"><span class="label label-sm label-<? echo $label;?>"><? echo $item["tipo"];?></span></td>
														<td><? echo $item["codigo"];?></td>
														<td><? echo $item["titulo"];?></td>
														<td class="hidden-480"><? echo $item["fecha"];?></td>
														<td><? echo $item["ciudad"];?></td>

														<td class="hidden-480"><span class="label label-sm"><? echo ucfirst($categoria[0]["nombre"]);?></span></td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                            
																<a class="btn btn-xs btn-info" href="<? echo base_url("backend/item/editar");?>/<? echo $item["id"];?>">
																	<i class="icon-edit bigger-120"></i>
																</a>

																<a class="btn btn-xs btn-danger bt_borrar" cual="<? echo $item["id"];?>" >
																	<i class="icon-trash bigger-120"></i>
																</a>

																<? if (!empty($album[0]["id"])) {?>
                                                                <a class="btn btn-xs btn-warning" href="<? echo base_url("backend")."/galeria/listar_fotos/".$album[0]["id"];?>">
																	<i class="icon-camera bigger-120"></i>
																</a>
																<? }?>
                                                            </div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="<? echo base_url("backend/item/editar");?>/<? echo $item["id"];?>" class="tooltip-info" data-rel="tooltip" title="" data-original-title="Editar">
																				<span class="blue">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success bt_borrar" cual="<? echo $item["id"];?>" data-rel="tooltip" title="" data-original-title="Borrar">
																				<span class="green">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<? echo base_url("backend")."/galeria/listar_fotos/".$album[0]["id"];?>" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Fotos">
																				<span class="red">
																					<i class="icon-camera bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>

											<? } ?>
                                            
											</table>
										</div><!-- /.table-responsive -->
									</div>


                                    </div>
                    

                                    <? if (isset($data["paginador"])) { ?>
                                    <div class="row">
                                    <div class="col-xs-12" style="margin:0 auto;">
										<? echo $data["paginador"];?>
                                    </div>
                                    </div>
									<? }?>

                    
                    
                    
                    
                    </div>					
                    
                    </div>
<script type="text/javascript">
$(document).ready(function(){

	$('.bt_borrar').click(function(e) {

			e.preventDefault();
			fila = $(this);
			id = $(this).attr("cual");
			
		    if (confirm('Esta seguro que desea eliminar el item seleccionado?')){ 

				
				$.post("<? echo base_url();?>/backend/item/eliminar", { cual:id}, function(result,status){
				
						fila.parent("div").parent("td").closest("tr").fadeOut("fast");
						
						$.gritter.add({
							// (string | mandatory) the heading of the notification
							title: 'ELIMINADO',
							// (string | mandatory) the text inside the notification
							text: 'El registro ha sido eliminado correctamente.',
							class_name: 'gritter-warning' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
						});
										
						return false;
				
				});

			}
			
	});

});

</script>