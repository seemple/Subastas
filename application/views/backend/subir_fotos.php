<link href="<? echo base_url();?>assets/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<? echo base_url();?>assets/uploadify/swfobject.js"></script>
<script type="text/javascript" src="<? echo base_url();?>assets/uploadify/jquery.uploadify.v2.1.0.min.js"></script>

<script type="text/javascript">
      $(document).ready(function() {
        $('#uploadify').uploadify({
          'uploader'  : '<? echo base_url();?>assets/uploadify/uploadify.swf',
          'script'    : '<? echo base_url()."backend/galeria/upload_fotos/".$data["idalbum"]; ?>',
          'cancelImg' : '<? echo base_url();?>assets/uploadify/cancel.png',
          'folder'    : '/fotos-galeria',
          'buttonText'    : 'Examinar',
		  'queueID'        : 'fileQueue',
		  'fileExt'     : '*.jpg;*.gif;*.png',
		  'auto'           : true,
		  'multi'          : true,
		  'sizeLimit'   : 1000000,
   		  'onAllComplete' : function(event,data) {
			  document.getElementByID('upload_form').submit();
	      }

        });
      });
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


			    		<form class="form" method="POST" action="" id="upload_form" enctype="multipart/form-data">

                        <div class="row">
                        
                        <div class="col-xs-12 col-lg-6" >

						<div class="widget-box">
                            <div class="widget-header">
                                <h4 class="smaller">Subir fotos a un album</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                <p class="muted">Seleccione las fotos que desea subir:</p>
                                <p><input type="file" name="uploadify" id="uploadify" /></p>
                                </div>
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-xs-12 col-lg-6" >
						
						<div class="widget-box">
                            <div class="widget-header">
                                <h4 class="smaller">Status de la subida:</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                <p class="muted"><div id="fileQueue"></div></p>
                                </div>
                            </div>
                        </div>

                        
                        </div>

                        </div>

                        <div class="row">
                                    
                            <div class="col-xs-12 col-lg-6">
                                <a class="btn btn-lg btn-success" href="<? echo base_url("backend/galeria/listar_fotos/".$data["idalbum"]);?>">
                                <i class="icon-ok"></i>
                                Finalizar Subida de fotos
                                </a>
                            </div>
                        
						</div>
                                    
						</form>


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