<div class="my-account-right-side">
					
					<div class="tab-container-block">
						<div class="profile-headding">
							<h2>Edit Profile<span>Your Information</span></h2>
						</div>
						
						<form class="add-studio-frm edit-profile" id="update_form" name="update_form" method="post">
							<div class="from-frst-block">
								<div class="left-block-studio">
									<!--input-block-->
									<div class="full-block-studio">
										<label>First Name</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="first_name" class="block-input" placeholder="Enter your first Name" value="<?php echo $user_data['first_name']; ?>">
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
								<div class="left-block-studio right">
									<!--input-block-->
									<div class="full-block-studio">
										<label>Last Name</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="last_name" class="block-input" placeholder="Enter your last Name" value="<?php echo $user_data['last_name']; ?>">
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
										<label>Date of Birth</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="dob" id="dob" class="block-input" placeholder="Enter your date of birth" value="<?php echo $user_data['dob']; ?>">
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
								
								<div class="left-block-studio right">
									<!--input-block-->
									<div class="full-block-studio">
										<label>Phone</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="phone" class="block-input" placeholder="Enter your phone number" value="<?php echo $user_data['phone']; ?>">
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
										<label>Address</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="address" class="block-input" placeholder="Enter your  address" value="<?php echo $user_data['address']; ?>">
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
								
								<div class="left-block-studio right">
									<!--input-block-->
									<div class="full-block-studio">
										<label>City</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="city" id="city" class="block-input" placeholder="Enter your city" value="<?php echo $user_data['city']; ?>">
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
										<label>State</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<input type="text" name="state" class="block-input" placeholder="Enter your state" value="<?php echo $user_data['state']; ?>">
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
								
								<div class="left-block-studio right">
									<!--input-block-->
									<div class="full-block-studio">
										<label>Country</label>
										<!--input-->
										<div class="input-block-studio">
											<div class="img-input-block">
												<select class="block-input" name="country">
													<option value="">Select</option>
													<?php
														if(is_array($countries) && count($countries) > 0)
														{
															foreach($countries as $country)
															{
																if($country['item_id']==$user_data['country'])
																{
																	$selected="selected";
																}
																else
																{
																	$selected="";
																}
																echo '<option '.$selected.' value="'.$country['item_id'].'">';
																echo $country['country'];
																echo '</option>';
																
															}
															
														}
														?>
												</select>
											</div>
										</div>
										<!--end-->
									</div>
									<!--input-block-->
								</div>
								
								
							</div>
														
							<div class="from-frst-block">
								<!--input-block-->
								<div class="full-block-studio">
									<label>Brief description about you and who you are</label>
									<!--input-->
									<div class="input-block-studio">
										<div class="img-input-block">
											<textarea class="block-input" Placeholder="Enter your brief description" name="biography"><?php echo $user_data['biography'];?></textarea>
										</div>
									</div>
									<!--end-->
								</div>
								<!--input-block-->
							</div>
							
							<div class="stu-rate save-btn">
								<button class="save">update profile</button>
							</div>
						</form>
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
	
	$('#update_form').validate({
		rules: {
				first_name: 'required',
				last_name: 'required',
				phone: 'required',
				address: 'required',
				city: 'required',
				state: 'required',
				country: 'required',
				dob: 'required',
				biography: 'required'
				
			},
		   
			messages: {
				first_name: 'Please enter your first name.',
				last_name: 'Please enter your last name.',
				phone: 'Please enter your phone number.',
				address: 'Please enter your address.',
				city: 'Please enter your city.',
				state: 'Please enter your state.',
				country: 'Please select your country.',
				dob: 'Please enter your date of birth.',
				biography: 'Please enter your biography.'			
				
			},
			errorElement:"div",
			errorClass:"error-input",
			submitHandler: function(form) {
				form.submit();
				}
			
	});	
	
	</script>
