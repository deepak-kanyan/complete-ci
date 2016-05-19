<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(isset($top_head)){ echo $top_head; } ?>	
<script>new WOW().init();</script>
<script type="text/javascript">
	jQuery("i").click(function(){
	  jQuery(".dropdown-1").slideToggle();
	  });
</script>
				
<script type="text/javascript">
  $(function(){
		$("#nav").addClass("js").before('<div id="menu"><img src="<?php echo base_url(); ?>assets/frontend/images/menu1.png"/></div>');	
		$("#menu").click(function(){
			$("#nav").slideToggle();
		});
	});
  jQuery(window).resize(function(){
  if(window.innerWidth >990) {
  jQuery("#nav").removeAttr("style");
  }
  });
	jQuery(document).ready(function(){
		jQuery(".slidesjs-pagination-item li").each( function(){
			jQuery(this).addClass("abc");
		});
		setTimeout(function() {
			$('#mydiv').fadeOut('fast');
		}, 1000);
		
		setTimeout(function() {
			$('#message').fadeOut('slow');
			
		}, 3000);
	});

</script>
</head>
<body class="innerpage">
	<!-----header-start----->
	<header class="inner-header">		
		<div class="header-outer">			
			<div class="logo"> 
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>assets/frontend/images/inner-logo.png"/> 
				</a>
			</div>
			<div class="right-div">	
				<nav>
					<ul id="nav" class="inner-menu">
						<?php if(isset($menu)){ echo $menu; } ?>
					</ul>
				</nav>					
				<div class="header-btn">
					<?php if($this->session->userdata('logged_in')!='' || $this->session->userdata('logged_in')!=null){
						 ?>
						<a href="<?php echo base_url(); ?>myprofile" class="sign-up-inner"> Profile </a>
						<a href="<?php echo base_url().'logout'; ?>" class="login sign-up-inner"> Logout </a>
						  <?php 
						   }
						   else
						   {  
							?>
						   <a href="<?php echo base_url().'signup' ; ?>" class="<?php if(isset($active) && $active=='signup') echo 'active'; ?> sign-up-inner"> Sign up </a>
							<a href="<?php echo base_url().'login'; ?>" class="login <?php if(isset($active) && $active=='login') echo 'active'; ?> sign-up-inner"> Login </a>
							
							<?php } ?>
				</div>
			</div>			
		</div>
	</header>
	<!-----header-end----->	

	<div class="login-banner">
		
		<div class="wrapper">
			<div class="page-title-block">
				<div class="heading-main-page">
					<h1><?php if(isset($title)){ echo $title; } ?></h1>
					
					<ul class="bread-outer">
						<li> <a class="active" href="<?php echo base_url(); ?>myprofile"> Home </a> </li>
						<i class="fa  fa-angle-right "></i>
						<li> <a href="#"> <?php if(isset($title)){ echo $title; } ?> </a> </li>
					</ul>
					
				</div>
				<div class="my-banr-rth">
					<h4> Welcome! <span> <?php if(isset($user_data)){ echo $user_data['first_name'].' '.$user_data['last_name']; } ?> </span> </h4>
					
				</div>
			</div>
		</div>
	</div>


<!-----Main Content Start----->

<div class="account-page-container new-account-container">
		<div class="wrapper">
			<div class="outer-message">
			<?php 
				if($this->session->flashdata('success')){
				echo '<div id="message" class="message-main success"><span class="fa fa-check "></span><p>'. $this->session->flashdata('success').'</p><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>';
				}
				elseif($this->session->flashdata('fail')){
					echo '<div id="message" class="message-main error"><span class="fa fa-check "></span><p>'. $this->session->flashdata('fail').'</p><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>';
				
				}
			?> 
			</div>
			<div class="acc-main-block">
				
<?php if(isset($sidebar)){ echo $sidebar; } ?>				
<?php if(isset($body)){ echo $body; } ?>

		</div>
	</div>
</div>
	
<!-----Main Content end----->


	<!-----footer main block----->
	<footer>
		<div class="wrapper">
			<p>&copy; Copyright <?php echo date('Y'); ?> Cars2udirect.com. All rights reserved. </p>
		</div>
	</footer>
	<!-----footer main block----->
	<div class="pop-over-ly" style="display: none;"></div>
<script>
	$(document).ready(function() {
			
			$('.open_menu').click(function(){
				
				$('.sub-list').not($(this).find(".sub-list")).hide();
				
				$(this).find('.sub-list').fadeToggle("slow");
				$(this).find('.fa-angle-down, .fa-angle-up').toggleClass('fa-angle-up fa-angle-down');    
				
			});
			
			$('#p_image').change(function() {
				$("#changepic").submit();				
			});
			
			$("#changepic").submit(function() {
			
			var formData = new FormData($(this)[0]);
			var url = $(this).attr('action');
						
				$.ajax({	
							type: "POST",
							data: formData,
							url: url,
							dataType: "json",
							beforeSend: function() {
								// setting a timeout
					//			$('#loading').show();
							},
							success: function(data)
							{	
							//	$('#loading').hide();
								
								if(data.status == 'success'){
								$('#changepic')[0].reset();	
								$('#user_image').attr('src',data.image);								
								
								var mess='<div class="success-msg" id="message">Profile picture changed successfully.</div>';
								$('.outer-message').html(mess);	
								setTimeout(function(){ $('#message').fadeOut('slow'); }, 5000);
								
								
								}
								else
								{
									$('#changepic')[0].reset();
									
									var mess='<div class="error-msg" id="message">Profile picture not changed.</div>';
									$('.outer-message').html(mess);	
									setTimeout(function(){ $('#message').fadeOut('slow'); }, 5000);
								}
								
							},
							error: function(data) 
							{
							//	$('#loading').hide();
								$('#changepic')[0].reset();
								var mess='<div class="error-msg" id="message">Profile picture not changed.</div>';
								$('.outer-message').html(mess);	
								setTimeout(function(){ $('#message').fadeOut('slow'); }, 5000);
							},
							 cache: false,
							 contentType: false,
							 processData: false        
				});
				return false;
			});
	 });
	 
</script>
</body>

</html>
