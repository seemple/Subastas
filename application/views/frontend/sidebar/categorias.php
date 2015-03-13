                        <? if (count($categorias["inmuebles"])>0) { ?>
                        <div class="widget">

							<h5 class="widgetheading"><i class="icon-home"></i> Inmuebles</h5>

								<ul class="cat">
									<? foreach ($categorias["inmuebles"] as $item) {?>
									<li><i class="icon-angle-right"></i> <a href="<? echo base_url();?>clasificados/<? echo $item["id"]."~".url_title($item["nombre"]);?>"><? echo utf8_decode($item["nombre"]);?></a><span> (<? echo $item["cantidad"];?>)</span></li>
                                    <? } ?>
								</ul>
						</div>
                        <? } ?>
                        
						<? if (count($categorias["vehiculos"])>0) { ?>
						<div class="widget">

							<h5 class="widgetheading"><i class="icon-truck"></i> Vehiculos</h5>

								<ul class="cat">
									<? foreach ($categorias["vehiculos"] as $item) {?>
									<li><i class="icon-angle-right"></i> <a href="<? echo base_url();?>clasificados/<? echo $item["id"]."~".url_title($item["nombre"]);?>"><? echo utf8_decode($item["nombre"]);?></a><span> (<? echo $item["cantidad"];?>)</span></li>
                                    <? } ?>
								</ul>
						</div>	
                        <? } ?>

                        <? if (count($categorias["muebles"])>0) { ?>
						<div class="widget">

							<h5 class="widgetheading"><i class="icon-exchange"></i> Muebles</h5>

								<ul class="cat">
									<? foreach ($categorias["muebles"] as $item) {?>
									<li><i class="icon-angle-right"></i> <a href="<? echo base_url();?>clasificados/<? echo $item["id"]."~".url_title($item["nombre"]);?>"><? echo utf8_decode($item["nombre"]);?></a><span> (<? echo $item["cantidad"];?>)</span></li>
                                    <? } ?>
								</ul>
						</div>
                        <? } ?>
                        
                        <? if (count($categorias["especiales"])>0) { ?>
                        <div class="widget">

							<h5 class="widgetheading"><i class="icon-pushpin"></i> Especiales</h5>

								<ul class="cat">
									<? foreach ($categorias["especiales"] as $item) {?>
									<li><i class="icon-angle-right"></i> <a href="<? echo base_url();?>clasificados/<? echo $item["id"]."~".url_title($item["nombre"]);?>"><? echo utf8_decode($item["nombre"]);?></a><span> (<? echo $item["cantidad"];?>)</span></li>
                                    <? } ?>
								</ul>
						</div>
                        <? } ?>