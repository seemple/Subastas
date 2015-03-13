<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8" />
		<title><? echo $content["titulo"];?></title>

		<meta name="description" content="<? echo $content["description"];?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="<? echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<? echo base_url();?>assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<? echo base_url();?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<? echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<? echo base_url();?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<? echo base_url();?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<? echo base_url();?>assets/js/html5shiv.js"></script>
		<script src="<? echo base_url();?>assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">Admin</span>
									<span class="white">Contenidos</span>
								</h1>
								<h4 class="blue">&copy; <? echo $content["cliente"];?></h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Por favor ingrese la siguiente informacion:
											</h4>

											<div class="space-6"></div>

							<form name="login" method="post" action="<? echo base_url()."auth/login";?>" id="form-login">

							<? if (isset($prevurl)) {?><input type="hidden" name="prevurl" value="<? echo $prevurl; ?>" /><? } else {   ?><input type="hidden" name="prevurl" value="backend/item/listar" /> <? } ?>

												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="email" id="email" placeholder="Email" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" id="password" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">

                                                    <label class="inline">
															<span class="lbl"> <?  echo $this->session->flashdata('message'); ?>	</span>
													</label>
                                                        
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>


										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" onClick="show_box('forgot-box'); return false;" class="forgot-password-link">
													<i class="icon-arrow-left"></i>
													Olvide mi Password
												</a>
											</div>

										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="icon-key"></i>
												Olvide Mi Password
											</h4>

											<div class="space-6"></div>
											<p>
												Ingrese su email y recibirá instrucciones para recuperarlo.
											</p>

											<form action="<? echo base_url()."auth/forgot";?>" method="post">


												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email2" id="email2" class="form-control" placeholder="Email" />
															<i class="icon-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="icon-lightbulb"></i>
															Enviar
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /widget-main -->

										<div class="toolbar center">
											<a href="#" onClick="show_box('login-box'); return false;" class="back-to-login-link">
												Back to login
												<i class="icon-arrow-right"></i>
											</a>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="icon-group blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="icon-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" />
															<i class="icon-retweet"></i>
														</span>
													</label>

													<label class="block">
														<input type="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="icon-refresh"></i>
															Reset
														</button>

														<button type="button" class="width-65 pull-right btn btn-sm btn-success">
															Register
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" onClick="show_box('login-box'); return false;" class="back-to-login-link">
												<i class="icon-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /widget-body -->
								</div><!-- /signup-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<? echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<? echo base_url();?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<? echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
	</body>

</html>
