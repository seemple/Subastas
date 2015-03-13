				<div class="span8">
					
						<div class="row">
                        
                            <div class="span4" >
                                <img src="img/publique-remate.jpg" />
                            </div>
                            <div class="span4 buscar-por-codigo">
                               <div class="row-fluid">
                                    <div class="span12 text-center">
                                        <h5 style="margin:5px 0px;">Buscar REMATE por codigo</h5>
                                    </div>
                                    <div class="span12 text-center" style="margin-left:0;">
	<? $attributes = array('name' => 'frmCodigo', 'id' => 'frmCodigo', "method"=>"POST"); echo form_open('buscar/remates',$attributes);?>
    									<input type="hidden" name="datos[tipo]" value="Remate" />
                                        <input tipe="text" name="datos[codigo]" value="Ingresar c&oacute;digo"  />
                                        <button class="btn btn-danger btn-flat" href="#">Buscar</button>
	<? echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
						
                        </div>
                        
					<!-- Buscador de ramates -->
					<?php echo $data["buscador-remates"]; ?>
					
                    <article>
					
                    <div class="row">
						<div class="span8">
							<?php echo $data["slider"]; ?>
						</div>
					</div>
					
                    
                    </article>
					
					<article>
						<?php echo $data["buscador-ventas-alquiler"]; ?>
					</article>
					<article>
						<div class="row">


							<div class="span8">
								<?php echo $data["ultimas-propiedades-publicadas"]; ?>
							</div>
						</div>
					</article>
					
					<div class="row">
                    	<div class="span8">
                            <div class="post-heading">
                                <h3>Noticias & Novedades</h3>						
                            </div>
						</div>
                    </div>
                    
					<article>
						<div class="row">

                        <?php echo $data["novedades"]; ?>
								
						</div>
					</article>
					
				</div>				

