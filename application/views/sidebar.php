<div class="my-account-left-side small-profile">
					<figure class="user-pic-profile">
						<?php 
						if(!empty($user_data['profile_image']))
						{
							$image = base_url().'uploads/'.$user_data['profile_image'];
						}
						else
						{
							$image = base_url().'assets/frontend/images/user-pic.png';
						}
						 ?>
						<img id="user_image" src="<?php echo $image;?>"/>
						<div class="fig-content">
							<h2 class="res-hidden">
							<?php if(isset($user_data)){ echo $user_data['first_name'].' '.$user_data['last_name']; } ?> 
							</h2> 
						<div class="up-load-img">	
							<a href="#"><img src="<?php echo base_url(); ?>assets/frontend/images/cam-user.png"/></a>
							<div class="prifile_pic_change">
								<form id="changepic" action="<?php echo base_url(); ?>user/change_image" method="post" enctype="multipart/form-data">
									<div id="up_img"></div>
									<input type="file" name="p_image" id="p_image" title="Update profile picture">
								</form>
							</div>
						</div>	
							
							
						</div>
					</figure>
					<ul class="profile-listing">
						<li class="<?php if(isset($active) && $active == 'my_profile') echo 'active'; ?>"><a href="<?php echo base_url(); ?>myprofile" class="list-p">My Profile</a></li>
						<li class="<?php if(isset($active) && $active == 'edit_profile') echo 'active'; ?>"><a href="<?php echo base_url();?>user/edit_profile" class="list-ep">Edit Profile</a></li>
						<li class="<?php if(isset($active) && $active == 'change_password') echo 'active'; ?>"><a href="<?php echo base_url(); ?>user/change_password" class="list-cp">Change Password</a></li>
						
					</ul>
</div>
