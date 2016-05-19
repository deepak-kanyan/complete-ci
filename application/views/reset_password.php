	<!-----login block----->
	<div class="login-outer">
		<div class="wrapper1">
			<div class="login-inner-block">
				<div class="login-left">
					<h1>Welcome</h1>
					<h5>Get the your own car <span> - Better then market price </span></h5>
					<div class="car-3-block">
						<div class="car-block1">
							<div class="icon-block-car"> <img src="<?php echo base_url() ?>assets/frontend/images/c1.png"/></div>
							<p>Live Demo</p>
						</div>
						<div class="car-block1">
							<div class="icon-block-car"> <img src="<?php echo base_url() ?>assets/frontend/images/c2.png"/></div>
							<p>Certified Inspection</p>
						</div>
						<div class="car-block1">
							<div class="icon-block-car"> <img src="<?php echo base_url() ?>assets/frontend/images/c3.png"/></div>
							<p>Save Time and Money</p>
						</div>
					</div>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium...</p>
					<a href="#">Create an account</a>
				</div>
				<div class="login-right">
					<div class="login-block">
						<div class="login-icon">
							<div class="icon-img">
								<img src="<?php echo base_url() ?>assets/frontend/images/login-icon.png"/>
							</div>
						</div>
						<form method="Post" id="reset_form" name="login_form" role="form" novalidate="novalidate">
							<div class="login-form">
								<h2>Reset Password</h2>
								<p></p>
								<div class="full-block">
									<div class="input-block">
										<input type="Password" class="key-icon" placeholder="Password" name="password" id="password">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="Password" class="key-icon" placeholder="Confirm Password" name="cpassword" id="cpassword">
									</div>
								</div>
								
								<div class="full-block">
									<div class="input-block">
										<div class="login-lock"><input type="Submit" class="login-btn" value="Submit"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-----login block end----->
	<script>
		$('#reset_form').validate({
		rules: {
				password: {
				  required: true,
				},
				cpassword :{
					equalTo:'#password'
				}
			},
		   
			messages: {
				password: {
					required:"Please enter password.",
				},
				cpassword: "Password does not match"
			},
			errorElement:"div",
			errorClass:"error-input",
			submitHandler: function(form) {
				form.submit();
				}
	});	
	</script>
