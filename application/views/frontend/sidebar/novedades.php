						<div class="widget">
                        <!-- novedades -->
						
						<h3 class="page-header">
							<i class="fa fa-bullhorn"></i> 
							<strong class="styleColor">Novedades</strong>
						</h3>

						<ul class="list-icon angle-right">
                              <? foreach ($novedades as $item) {?>
							  <li><a href="<? echo $item["link"];?>" target="_blank" class="color-gris"><? echo $item["titulo"];?></a></li>
                        	  <? }?>
                        </ul>
