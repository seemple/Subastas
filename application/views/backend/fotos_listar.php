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

		$('.thumbnail2').colorbox(colorbox_params);
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
								<a href="<? echo base_url("backend");?>/galeria/listar">Galeria de Fotos</a>
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
								<? 
                                
                                $equal = array ("id"=>$data["idalbum"]);
								$titulo = get_string("albumes",NULL,$equal);
								
                                echo (utf8_decode($titulo[0]["nombre"]));
                                                              
                                ?> 

							</h1>
						</div><!-- /.page-header -->
						
                        
                        <div class="pull-right" style="margin-bottom:20px;"><a href="<? echo base_url("backend");?>/galeria/subir_fotos/<? echo $data["idalbum"];?>" class="btn">
												<i class="icon-cloud-upload align-top bigger-125"></i>
												Subir Fotos
											</a>
                                            </div>

						<form role="form" method="post" action="<? echo base_url("backend/galeria/");?>/<? echo $data["accion"];?>">
                		
                        <input type="hidden" name="id_album" value="<? echo $data["idalbum"];?>">
                        
                        <div class="row">
                        
                        <div class="col-xs-12" >

						<? $label=""; $n=0; foreach ($data["info"] as $item) { ?>

                            	<div class="col-sm-6 col-md-4 col-lg-3" style="margin-bottom:25px;" id="foto-<? echo $n;?>">
                                	<div class="thumbnail">
                                        <img src="<? echo base_url("fotos-galeria/");?>/thumb_<? echo $item["nombre"];?>" style="margin-top:15px;">
                                        <div class="caption">
                                            <h3><? echo $item["caption"];?></h3>
                                            <p><button class="btn btn-xs btn-danger delFoto" type="button" cual='<? echo $n; ?>' idfoto='<? echo $item["id"]; ?>'>ELIMINAR</button></p>
                                        </div>
										<div class="row-fluid clearfix">
                                            <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-bottom:5px;">Titulo: <input type="text" class="form-control" name="caption[<? echo $item["id"]; ?>]" value="<? echo $item["caption"];?>"></div>
                                             <div class="col-lg-6 col-sm-3 col-xs-6" style="margin-bottom:15px;">Orden: <input type="text" class="form-control" name="orden[<? echo $item["id"]; ?>]" value="<? echo $item["orden"];?>"></div>
                                        </div>
                                    </div>
                                </div>
                                
						<? $n++;  } ?>
                        
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

									<? if (isset($data["paginador"])) { ?>
                                        <div class="row">
                                        <div class="col-xs-12" style="margin:0 auto;">
                                            <? echo $data["paginador"];?>
                                        </div>
                                        </div>
									<? }?>


                    </div>
                    
                </div>
 
 <script language="javascript"> 
                   
 $(document).ready(function() {

	$(".delFoto").click(function(e) {
	
		e.preventDefault();
		
	    if (confirm('¿Está seguro que desea eliminar la foto seleccionada?')){ 

			cual = $(this).attr("cual");
			idFoto = $(this).attr("idFoto");
			if (idFoto !="") {
			
				$.post("<? echo base_url();?>/backend/galeria/borrar_foto", { idFoto: idFoto }, function(data){
					$("#foto-"+cual).fadeOut("fast");
				});
			}
		
		}
		
		
	});


});

</script>