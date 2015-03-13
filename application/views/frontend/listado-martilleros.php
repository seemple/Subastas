<div class="span8">
				
	<article>
		<div class="row">
	
			<div class="span8">
				
                <div class="post-heading ">
					<h3 style="margin-top:0px !important;">Socios</h3>						
				</div>

                <div class="row-fluid">
                
					<div class="pagination clearfix pagination-mini"> 
						<ul> 
                        	<?php $alphas = range('A', 'Z');
							foreach ($alphas as $item) {
							?>
							<li><a href="<? echo base_url("socios/buscar/".$item); ?>"><? echo $item;?></a></li> 
							<? }?>
                        </ul> 
					</div>
                
                
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Apellido</th>
                      <th>Nombre</th>
                      <th>Tel&eacute;fono</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $n=0; foreach($data['usuarios'] as $us){ ?>
                    <tr>
                      <td><? echo $us["apellido"];?></td>
                      <td><? echo $us["nombre"];?></td>
                      <td><? echo $us["telefono"];?></td>
                    </tr>
                    <?php $n++; } ?>
                  </tbody>
                </table>
                                
                </div>
                
                
				
			</div>
		</div>
	</article>
	<div class="clearfix">
	<?php if (isset($data["paginador"])) { ?>
                            <div class="pagination clearfix"> 
                                <? echo $data["paginador"];?>
                            </div>
    <?php }?>
	</div>
</div>	