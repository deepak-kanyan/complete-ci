<div class="my-account-right-side">
					
					<div class="tab-container-block">
						<div class="profile-headding">
							<h2>Change Password<span>Your Information</span></h2>
						</div>
						
						<form action="<?php echo base_url();?>user/change_password" class="add-studio-frm edit-profile" id="change_passowrd" name="change_passowrd" method="post">
							<div class="from-frst-block">
								<div class="left-block-studio">
									<!--input-block-->
									<div class="full-block-studio">
										<label>Current Password</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="password" name="old_password" class="block-input" placeholder="Current password">
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
								<div class="left-block-studio right">
									<!--input-block-->
									<div class="full-block-studio">
										<label>New Password</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="password" name="password" id="password" class="block-input" placeholder="New password" >
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
							</div>
							<div class="from-frst-block">
								<div class="left-block-studio">
									<!--input-block-->
									<div class="full-block-studio">
										<label>Confirm Password</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="password" name="cpassword" class="block-input" placeholder="Confirm password" >
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
							
							</div>
							<div class="stu-rate save-btn">
								<button class="save">update password</button>
							</div>
						</form>
					</div>
				</div>
<script>
		
	$('#change_passowrd').validate({
		rules: {
				old_password: 'required',
				password: 'required',				
				cpassword :{
					equalTo:'#password'
				}
			},
		   
			messages: {
				old_password: "Please enter current password.",
				password:"Please enter password.",
				cpassword: "Password does not match."			
				
			},
			errorElement:"div",
			errorClass:"error-input",
			submitHandler: function(form) {
				form.submit();
				}
			
	});	
	
	</script>
