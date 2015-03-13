	        		<script type="text/javascript">
		
		jQuery(function($) {
		
			var colorbox_params = {
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="icon-arrow-left"></i>',
			next:'<i class="icon-arrow-right"></i>',
			close:'&times;',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = 'auto';
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		
		};

		$('.thumbnail').colorbox(colorbox_params);
		$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon

		/**$(window).on('resize.colorbox', function() {
			try {
				//this function has been changed in recent versions of colorbox, so it won't work
				$.fn.colorbox.load();//to redraw the current frame
			} catch(e){}
		});*/
		})
		
		</script>
        
        <div class="main-content">
					
                    <div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<? echo base_url("backend");?>/articulos/listar">Home</a>
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
														<th width="40%">Titulo</th>
														<th width="30%">Copete</th>
														<th width="10%">Fecha</th>
														<th width="10%">Seccion</th>
														<th width="10%"></th>
													</tr>
												</thead>
	
    											<? $label=""; foreach ($data["info"] as $item) { 
												
													//formateo la fecha
													$date = DateTime::createFromFormat('Y-m-d', $item["created_at"]);
													$fecha = $date->format('d-m-Y');	

												?>

													<tr>
														<td><? echo $item["title"];?></td>
														<td><? echo word_limiter($item["deck"], 10);?></td>
														<td><? echo $fecha;?></td>
														<td><span class="label label-sm"><? echo $item["seccion"];?></span></td>
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                            
																<a class="btn btn-xs btn-info" href="<? echo base_url("backend/articulos/editar");?>/<? echo $item["id"];?>">
																	<i class="icon-edit bigger-120"></i>
																</a>

																<a class="btn btn-xs btn-danger bt_borrar" cual="<? echo $item["id"];?>" >
																	<i class="icon-trash bigger-120"></i>
																</a>

																<? if ($item["photo"]!="") {?>
                      													<a class="btn btn-xs btn-warning thumbnail" data-rel="colorbox" target="_blank" href="<? echo base_url();?>/fotos/articulos/<? echo $item["photo"];?>">
																		<i class="icon-camera bigger-120"></i>
																	</a>
                                                                 <? } ?>
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="<? echo base_url("backend/articulos/editar");?>/<? echo $item["id"];?>" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success bt_borrar" cual="<? echo $item["id"];?>" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<? if ($item["photo"]!="") {?>
																		<li>
																			<a href="<? echo base_url();?>/fotos/articulos/<? echo $item["photo"];?>"  target="_blank"  class="tooltip-error thumbnail" data-rel="tooltip" title="" data-rel="colorbox" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-camera bigger-120"></i>
																				</span>
																			</a>
																		</li>
                                                                        <? } ?>
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
			
		    if (confirm('Esta seguro que desea eliminar el articulo seleccionado?')){ 

				
				$.post("<? echo base_url();?>/backend/articulos/eliminar", { cual:id}, function(result,status){
				
						fila.parent("div").parent("td").closest("tr").fadeOut("fast");
						
						$.gritter.add({
							// (string | mandatory) the heading of the notification
							title: 'ELIMINADO',
							// (string | mandatory) the text inside the notification
							text: 'El socio ha sido eliminado correctamente.',
							class_name: 'gritter-warning' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
						});
										
						return false;
				
				});

			}
			
	});

});

</script>