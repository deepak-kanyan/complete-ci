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
					<a href="<?php echo base_url(); ?>login">Already have an account</a>
				</div>
				<div class="login-right">
					<div class="login-block">
						<div class="login-icon">
							<div class="icon-img" style="margin-top:-42px">
								<?php if($user_info['profile_image'] != ''){
										$src = base_url().'uploads/'.$user_info['profile_image'];
									}else{
										$src = base_url().'assets/frontend/images/login-icon.png';
									} ?>
								<img src="<?php echo $src ?>" height="80" width="80"/>
							</div>
						</div>
						<form method="post" id="register_form" name="register_form" enctype="multipart/form-data">
							<div class="login-form sign-up">
								<h2>Update</h2>
								<p>To Find your own car, login here</p>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="mail-icon" placeholder="first_name" name="first_name" id="first_name" value="<?php echo $user_info['first_name']; ?>">										
								</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="last_name" id="last_name" name="last_name" value="<?php echo $user_info['last_name']; ?>">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="email" id="email" name="email" value="<?php echo $user_info['email'] ?>" readonly> 
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<?php  ?>
										<select id="gender" name="gender">
											<option value="">Select Gender</option>
											<option value="male" <?php if($user_info['gender'] == 'male') echo 'selected' ?> >Male</option>
											<option value="female" <?php if($user_info['gender'] == 'female') echo 'selected' ?> >Female</option>
										</select>
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="date of birth" id="dob" value="<?php echo $user_info['dob']; ?>" name="dob">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="address" id="address" name="address" value="<?php echo $user_info['address']; ?>">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="city" id="city" name="city" value="<?php echo $user_info['city']; ?>">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="state" id="state" name="state" value="<?php echo $user_info['state']; ?>">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="phone" id="phone" name="phone" value="<?php echo $user_info['phone']; ?>">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="country" id="country" name="country" value="<?php echo $user_info['country']; ?>">
									</div>
								</div>
								<div class="full-block">
									<div class="input-block">
										<input type="text" class="key-icon" placeholder="zipcode" id="zipcode" name="zipcode" value="<?php echo $user_info['zipcode']; ?>">
									</div>
								</div>							
								<div class="full-block">
									<div class="input-block">
										<input type="file" class="key-icon" id="profile_image" name="profile_image">
									</div>
								</div>							
								<div class="full-block">
									<div class="input-block">										
										<div class="login-lock"><input type="Submit" class="login-btn" id="submit" value="Update"></div>
									</div>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	
	$(function() {
		$("#dob").datepicker({ 
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange: '-100:+0'
		});
	});
	
	</script>
	<!-----login block end----->
