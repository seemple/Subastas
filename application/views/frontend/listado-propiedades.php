<div class="span8">
				
    <div class="row">
        <div class="span8">
        <? echo $data["clasificados"];?>
        </div>
    </div>
                
	<div class="clearfix">
		<?php if (isset($data["paginador"])) { ?>
        <div class="pagination clearfix"> 
            <? echo $data["paginador"];?>
        </div>
        <?php }?>
	</div>
    
</div>	