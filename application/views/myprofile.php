<div class="my-account-right-side">
					
					<div class="tab-container-block">
						<div class="profile-headding">
							<h2>Basic info
								<span> Your Personal Information </span>
							</h2>
						</div>
						<div class="info-block">
							<div class="info-block1 orange">
								<div class="inner-block-info"><?php echo $user_data['email']; ?></div>
							</div>
							<div class="info-block1 phone-b">
								<div class="inner-block-info"><?php echo $user_data['phone']; ?></div>
							</div>
							<div class="info-block1 loc-b">
								<div class="inner-block-info"><?php echo $user_data['address']; ?></div>
							</div>
							<div class="info-block1 cal-b">
								<div class="inner-block-info"><?php echo date('M d, Y',strtotime($user_data['dob'])); ?></div>
							</div>
						</div>
						<div class="basic-info">
							<div class="bs-haeding-new">
								<h2>Biography</h2>
							</div>
							<p><?php echo $user_data['biography'];  ?></p>
						</div>
			</div>
</div>
