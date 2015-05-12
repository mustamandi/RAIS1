<!DOCTYPE html>
<html>
<head>
	<?php include ("includes/head.php") ?>
</head>
<body>
	<div id="container">
		
		<section id="form">
			<div class="container"> 
				   
				<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
					<div class="panel white-alpha">
					<!-- <div class="alert alert-info">
				   	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   	<strong>Title!</strong> Alert body ...
			   </div>  -->
						<div class="panel-heading">
							<div class="panel-title text-center"><h2><span class="text-primary">Road Asset Inventory System</span></h2></div>
						</div> 

						<div class="panel-body">
							<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
								<form id="loginform" class="form-horizontal" role="form">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="login-username" class="form-control" name="username" placeholder="username or email" type="text">                                        
								</div>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input pwfprops="," id="login-password" class="form-control" name="password" placeholder="password" type="password">
								</div>
								<div class="input-group col-xs-12 text-center login-action">
								  <button type="button" class ="btn btn-primary form-control">Login</button>
								</div>
								<div style="margin-top:10px" class="form-group">
									<div class="col-sm-12 controls">
									  
									</div>
								</div>
							</form>     
						</div>                     
					</div>  
				</div>
			</div>
		</section>
		
	</div> <!-- end of container -->
	<div  class="back_image"><img src="assets/img/login_image.jpg"></div>
	<?php include("includes/footer.php") ?>
</body>
</html>