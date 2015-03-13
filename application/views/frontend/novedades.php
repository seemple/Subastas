<div class="span8">
				
	<article>
		<div class="row">
	
			<div class="span8">
				
                <div class="post-heading ">
					<h3 style="margin-top:0px !important;">Novedades</h3>						
				</div>
                
                <div class="row">
                
                <? echo $data["novedades"];?>
                
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