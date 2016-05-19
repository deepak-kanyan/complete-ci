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
		$("#nav").addClass("js").before('<div id="menu"><img src="<?php echo base_url(); ?>assets/frontend/images/menu.png"/></div>');	
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
			alert("test");
			jQuery(this).addClass("abc");
		});
		setTimeout(function() {
			$('#mydiv').fadeOut('fast');
		}, 1000);
		
		setTimeout(function() {
			$('#message').fadeOut('slow');
			
		}, 3000);
		
		$('.fa-close').click(function()
		{
			$('#message').hide('slow');
		});
	});

</script>
</head>

<body class="<?php if(isset($class)){ echo $class; } ?>">
	<!-----header-start----->
	<header>		
		<div class="header-outer">			
			<div class="logo"> 
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>assets/frontend/images/logo.png"/> 
				</a>
			</div>
			<div class="right-div">	
				<nav>
					<ul id="nav">
						<?php if(isset($menu)){ echo $menu; } ?>
					</ul>
				</nav>					
				<div class="header-btn">
					<?php if($this->session->userdata('logged_in')!='' || $this->session->userdata('logged_in')!=null){
						 ?>
						<a href="<?php echo base_url(); ?>myprofile"> Profile </a>
						<a href="<?php echo base_url().'logout'; ?>" class="login"> Logout </a>
						  <?php 
						   }
						   else
						   {  
							?>
						   <a href="<?php echo base_url().'signup' ; ?>" class="<?php if(isset($active) && $active=='signup') echo 'active'; ?>"> Sign up </a>
							<a href="<?php echo base_url().'login'; ?>" class="login <?php if(isset($active) && $active=='login') echo 'active'; ?>"> Login </a>
							
							<?php } ?>
				</div>
			</div>			
		</div>
	</header>
	<div class="outer-message home-error">
		<?php 
		if($this->session->flashdata('success')){
			echo '<div id="message" class="message-main success"><span class="fa fa-check "></span><p>'. $this->session->flashdata('success').'</p><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>';
		}
		elseif($this->session->flashdata('fail')){
			echo '<div id="message" class="message-main error"><span class="fa fa-check "></span><p>'. $this->session->flashdata('fail').'</p><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>';
		
		}
		?> 
	</div>
<!-----header-end----->

<!-----Main Content Start----->
				
<?php if(isset($body)){ echo $body; } ?>

<!-----Main Content end----->

	
<!-----footer block----->
<?php if(isset($footer)){ echo $footer; } ?>
<!-----footer block----->

</body>

</html>
