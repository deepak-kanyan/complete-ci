<div class="login-banner">
		<div class="wrapper">
			<div class="page-title-block">
				<div class="heading-main-page">
					<h1><?php echo $about['page_title']; ?></h1>
					<ul class="bread-outer">
						<li> <a class="active" href="<?php echo base_url(); ?>"> Home </a> </li>
						<i class="fa  fa-angle-right "></i>
						<li> <a href="<?php echo base_url(); ?>about"> <?php echo $about['page_title']; ?> </a> </li>						
					</ul>
				</div>	
				<?php if(isset($user_data) && !empty($user_data)){ ?>
				<div class="my-banr-rth">
					<h4> Welcome! <span> <?php if(isset($user_data)){ echo $user_data['first_name'].' '.$user_data['last_name']; } ?> </span> </h4>					
				</div>
				<?php } ?>			
			</div>
		</div>
</div>
<div class="account-page-container new-account-container">
		<div class="wrapper">
			<div class="about-us">
				<div class="about-img">
					<img src="<?php echo 
					base_url().'uploads/pages/'.$about['image']; ?>"/>
				</div>
				<?php echo $about['page_content']; ?>
			</div>
		</div>
	</div>
	
	
