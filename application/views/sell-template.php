<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(isset($top_head)){ echo $top_head; } ?>	
<script type="text/javascript">
  $(function(){
		$(this).scrollTop(0);
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

<body>
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
	
<!-----header-end----->

<!-----Main Content Start----->
				
<?php if(isset($body)){ echo $body; } ?>

<!-----Main Content end----->

	
<!-----footer block----->
<?php if(isset($footer)){ echo $footer; } ?>
<!-----footer block----->

</body>

</html>
