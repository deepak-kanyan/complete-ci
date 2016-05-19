<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(isset($top_head)){ echo $top_head; } ?>
<script>new WOW().init();</script>
<script type="text/javascript">
$("i").click(function(){
	$(".dropdown-1").slideToggle();
 });
</script>
				
<script type="text/javascript">
	$(function(){
		$("#nav").addClass("js").before('<div id="menu"><img src="<?php echo base_url(); ?>assets/frontend/images/menu.png"/></div>');	
		$("#menu").click(function(){
			$("#nav").slideToggle();
		});
	});
	
	$(window).resize(function(){
		if(window.innerWidth >990) {
			$("#nav").removeAttr("style");
		}
	});
	
	$(document).ready(function(){
		$(".slidesjs-pagination-item li").each( function(){
			$(this).addClass("abc");
		});
	});
</script>


</head>
<body>
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
					<?php if($this->session->userdata('logged_in') !='' || $this->session->userdata('logged_in') != null){
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
		<div class="header-container">
			<div class="header-container-inner">
				<h2>Get the car <b> you </b>want not <b> car salesman </b> wants</h2>
				<div class="main-step-header">
					<div class="step-oter-main wow fadeIn">
						<!--block1-->
						<div class="step-block1 padd1">
							<div class="icon-block"></div>
							<div class="text-block-step">
								<div class="step-txt-inner">
									<h2>Search</h2>
									<ul class="step-listing">
										<li>Search My Future Car</li>
										<li>Sed ut perspiciatis unde </li>
										<li>Omnis iste natus error sit  </li>
									</ul>
								</div>
							</div>
						</div>
						<!--block1 end-->
						<!--block2-->
						<div class="step-block1 step-block2 padd2">
							<div class="text-block-step">
								<div class="step-txt-inner">
									<h2>View Details</h2>
									<ul class="step-listing">
										<li>Search My Future Car</li>
										<li>Sed ut perspiciatis unde </li>
									</ul>
								</div>
							</div>							
							<div class="icon-block"></div>
						</div>
						<!--block2 end-->
						<!--block3-->
						<div class="step-block1 step-block3 padd3">
							<div class="icon-block"></div>
							<div class="text-block-step">
								<div class="step-txt-inner">
									<h2>Request</h2>
									<ul class="step-listing">
										<li>Live View </li>
										<li>Schedule Test Drive</li>
										<li>Make an Offer </li>
									</ul>
								</div>
							</div>
						</div>
						<!--block3 end-->
					</div>
				</div>
			</div>
		</div>			
		<div class="header-search-block">
			<div class="search-inner-block">
				<p>Search My Future Car</p>
				<div class="search-select-box hm_srh">
					<select id="make" data-classname="select-theme-default" class="sel-bg-seach new_sel">
						<option value="">Select</option>				
					</select>
					<select id="model" data-classname="select-theme-default" class="sel-bg-seach new_sel">
						<option value="">Select</option>
					</select>
					<button id="search" class="search-btn-1">Search</button>					
				</div>
				<a href="#" class="av-seach">Advance Search</a>
			</div>
		</div>
	</header>
	<!-----header-end----->
	<!-----buy-cell-start----->
	<div class="buy-celler-block">
		<div class="buy-celler-block-inner1 wow bounceInDown">
			<div class="left-imgfig"><img src="<?php echo base_url(); ?>assets/frontend/images/buy-left.png"/> </div>
			<div class="buy-content">
				<div class="buy-content-inner">
					<div class="buyer-icon">			
					</div>
					<h2>BUY</h2>
					<ul>
						<li class="b1">Giving vehicle live demo</li> 
						<li class="b2">Test drive booking </li>
						<li class="b3">Certified Inspection </li>
						<li class="b4">Save Time and Money</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="buy-celler-block-inner1 wow bounceInUp">
			<div class="left-imgfig"><img src="<?php echo base_url(); ?>assets/frontend/images/cell-right.png"/> </div>
			<div class="buy-content sell-content-icon">
				<div class="buy-content-inner ">
					<div class="buyer-icon">			
					</div>
					<h2>SELL</h2>
					<ul>
						<li class="s1">Get better then market </li> 
						<li class="s2">Fast and Easy </li>
						<li class="s3">Gurantted recall free  </li>
						<li class="s4">We handle all paper work</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-----buy-cell-end----->	
	<!-----welcome block----->
	<div class="well-come-outer">
		<div class=" well-left wow bounceInUP">
			<div class="well-left-img"><img src="<?php echo base_url(); ?>assets/frontend/images/wel-come1.png"/> </div>
		</div>
		<div class=" well-right wow bounceInDown">
			<div class="welcome-content">
				<div class="welcome-cell-content">
					<h2><?php $about['page_title']; ?>About</h2>
					<p><?php
					$content = strip_tags($about['page_content']);
					 echo substr($content,0,250).'...'; 
					 
					 ?></p> 
					<div class="read-more">
						<a href="<?php echo base_url(); ?>about">Read More</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-----welcome block end----->
	<!-----know what your car block----->
	<div class="know-abt-car">
		<h2>Know What Your Car's <span>Worth</span></h2>
		<p>Get your car information on the basis of vin number.</p>
		<div class="know-abt-car-main">
			<div class="know-abt-car-left">
				<img src="<?php echo base_url(); ?>assets/frontend/images/k-car.png"/>
			</div>
			<div class="know-abt-car-right">
			<form method="post" action="<?php echo base_url(); ?>vin_details" id="car_info_frm" name="car_info_frm" >
				<div class="about-car-inner">
					<h3>Enter VIN</h3>
					<div class="full-block-input">
						<input type="text" id="vin" maxlength="17" minlength="17" name="vin" placeholder="VIN"/>									
					</div>
					<h3>How Many Miles Does it Have?</h3>
					<div class="full-block-input">
						<!--div class="left-c mileage_span">
							<img src="<?php echo base_url(); ?>assets/frontend/images/left-c.png"/>
						</div-->
						
						<div class="left-c range-block home_range">
							
							<div class="home_outer_mileage">
								<div id="mileage-range"></div>
							</div>
							<div class="dynamic-mileage range-txt-main">								
								<div class="range-right-txt right-mileage"></div>
							</div>
						</div>
						
						<div class="left-b hide"><input type="text" readonly id="mileage" name="mileage" placeholder="Mileage"/></div>
					</div>
					<div class="get-btn">
						<a id="get_info_btn" href="javascript:;">GET INFO</a>
						<a id="sell_car_btn" href="javascript:;">Sell Car</a>
					</div>
				</div>
				<div class="g-icon-new">
					<div class="g-blk-1"><img src="<?php echo base_url(); ?>assets/frontend/images/g1.png"/>Accurate Market Value Range</div>
					<div class="g-blk-1"><img src="<?php echo base_url(); ?>assets/frontend/images/g2.png"/>GET IT DONE FROM HOME</div>
				</div>
			</div>
		</form>
		</div>
	</div>
	<!-----know what your car block----->
	<!-----textimonail block----->
	<?php if(isset($testimonials) && is_array($testimonials) && count($testimonials) > 0) { ?>
	
	<div class="testimonial wow fadeIn">
		<div class="testi-inner">
			
			<div class="quot"><div class="quort-inner"></div></div>
			<h2>What our Clients  are <span>saying...</span></h2>
			<div class="testimonial-silder-home">
				<a href="javascript:;" class="ls1"></a>
				<a href="javascript:;"class="ls2"></a>
				
				<ul id="testimonail_home">
					<?php foreach($testimonials as $testimonial) { ?>
					<li>	
							<p><?php echo $testimonial['message']; ?></p>
							<p><i><?php echo $testimonial['name']; ?></i></p>
							<div class="quot img-user-testi"><div class="quort-inner"><img src="<?php echo base_url().'uploads/stories/'.$testimonial['image']; ?>"></div></div>
					</li>					
					<?php }  ?>
					
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-----textimonail block end----->
	<!-----subscribe block----->
	<div class="subscribe">
		<div class="subscribe-inner wow fadeInDown">
			<div class="left-subscribe">
				<h2>Subscribe our Newsletter</h2>
				<p>Enter your email id and subscribe to get daily updates and weekly newsletters</p>
			</div>
			<div class="right-subscribe">
				<div class="message-main error hide" id="error-sub"><span class="fa fa-close "></span><b>Sorry could not subscribed. Network error.</b> <a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>
				
				<div class="message-main success hide" id="success-sub"><span class="fa fa-check "></span><b>Your have subscribed successfully.</b><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>
				
				<form method="post" id="subscribe_frm" name="subscribe_frm">
					<input type="text" name="email" id="email" class="sub-txt-input"/>
					<input type="submit" value="Subscribe" class="sub-txt-btn"/>
				</form>
			</div>
		</div>
	</div>
	<!-----subscribe block end----->
	<?php if(isset($footer)){ echo $footer; } ?>
	
</body>
<script>
	
$(function () {	

	 $( "#mileage-range" ).slider({	
		range: "min",
		orientation: "horizontal",	
		min: 5000,
		max: 100000,
		step:5000,		
		slide: function( event, ui ) {					
			$( ".right-mileage" ).text(ui.value + " MILES" );
			$("#mileage").val(ui.value);
		}
	});

	$('#testimonail_home').bxSlider({
	  pager:false,
	  auto: true,
	  infiniteLoop:true,
	  nextSelector: '.ls2',
	  prevSelector: '.ls1',		 
	  nextText: '<img src="<?php echo base_url(); ?>assets/frontend/images/ls2.png"/>',
	  prevText: '<img src="<?php echo base_url(); ?>assets/frontend/images/ls1.png"/>'
	  
	});
	
	$('.fa-close').click(function()
	{
		$('.message-main').hide('slow');
	});	
	
	setTimeout(function() {
		$('.message-main').fadeOut('slow');
		
	}, 3000);
		
	
	$('#search').on('click',function()
	{
		return false;
	});
	
	$("#subscribe_frm").validate({
			rules: {
				email: {
					required:true,
					email:true,
					remote:{
					url:"<?php echo base_url(); ?>home/check_sub_email"	,
					type:"post",
					data: { 
						email: function() { 
							return $("#email").val(); 
							}
						}		
					}				
					}
			},
			messages:{				
				email:{
					required:'Please enter your email address.',
					email:'Please enter valid email address.',
					remote:"This email address is already subscribed."
				}
			},
			errorElement:"label",
			errorClass:"error_home",
			errorPlacement: function(error, element) 
			{			
				
				if (element.attr("name") == "email") 
				{
					error.insertAfter(".sub-txt-btn");
				} 
			},
			submitHandler: function(form) {
				return false;
				//form.submit();
			}
		});
					
	$('#subscribe_frm').on('submit',function()
	{
		
			if ($("#subscribe_frm").valid()) {				
				$.ajax({
					type: "POST",
					async:true,
					url: '<?php echo base_url(); ?>home/subscribe',
					data: $('#subscribe_frm').serialize(),
					success: function(res) {
						if(res==1) {
							$("#success-sub").show();
						} else if(res==0) {
							$("#error-sub").show();
						}
						setTimeout(function() {
							$('.message-main').fadeOut('slow');
							
						}, 3000);
					} 
				});
				return false;
			}
			else
			{
				return false;
			}			
		
		return false;
	});
	
	
	
	
	$('#get_info_btn').on('click',function(){
		return false;
	});
	
	$('#sell_car_btn').on('click',function(){
		return false;
	});
	
	 
});
</script>
</html>
