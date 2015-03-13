				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<a class="btn btn-success" href="<? echo base_url("backend");?>/item/listar">
								<i class="icon-home"></i>
							</a>

							<a class="btn btn-danger" href="<? echo base_url("backend");?>/galeria/listar">
								<i class="icon-camera"></i>
							</a>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-home"></i>
								<span class="menu-text"> Operaciones </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<? echo base_url("backend");?>/item/nuevo">
										<i class="icon-double-angle-right"></i>
										Nueva
									</a>
								</li>

								<li>
									<a href="<? echo base_url("backend");?>/item/listar">
										<i class="icon-double-angle-right"></i>
										Listar
									</a>
								</li>
							</ul>
                            
                            
						</li>


						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-camera"></i>
								<span class="menu-text"> Galeria de fotos </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li>
									<a href="<? echo base_url("backend");?>/galeria/nuevo">
										<i class="icon-double-angle-right"></i>
										Nueva
									</a>
								</li>

								<li>
									<a href="<? echo base_url("backend");?>/galeria/listar">
										<i class="icon-double-angle-right"></i>
										Listar
									</a>
								</li>
							</ul>
						</li>





						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>