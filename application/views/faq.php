<div class="login-banner">
		<div class="wrapper">
			<div class="page-title-block">
				<div class="heading-main-page">
					<h1><?php echo $title; ?></h1>
					<ul class="bread-outer">
						<li> <a class="active" href="<?php echo base_url(); ?>"> Home </a> </li>
						<i class="fa  fa-angle-right "></i>
						<li> <a href="#"> <?php echo $title; ?> </a> </li>						
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
<div class="vin-number-page">
		<div class="wrapper">
			<div class="vin-number-page-inner faq">
				<h2><span>Frequently Asked Questions </span> </h2>
				<p>Get all the answers you need right here.</p>
				<div class="buy-cell-btns">
					<a href="javascript:;" id="buy_c_btn" class="btnbuysell active">BUY CAR</a>
					<a href="javascript:;" id="sell_c_btn" class="btnbuysell">Sell Car</a>
				</div>
			
			<div id="buy_acc" class="faq_acc">
				<?php if(isset($faq_data) && is_array($faq_data) && count($faq_data) > 0) { 
					
					foreach($faq_data as $faq) { 
						if($faq['category_id'] == 2) { 
				?>
				
				<h2><?php echo $faq['question']; ?> <i class="faq-arr"></i></h2>
				<div>
					<p><?php echo $faq['answer']; ?></p>
				</div>
				<?php } } } ?>
						
			</div>
			
			<div id="sell_acc" class="faq_acc">
				
				<?php if(isset($faq_data) && is_array($faq_data) && count($faq_data) > 0) { 
						
						foreach($faq_data as $faq) { 
							if($faq['category_id'] == 1) { 
					?>
					
					<h2><?php echo $faq['question']; ?> <i class="faq-arr"></i></h2>
					<div>
						<p><?php echo $faq['answer']; ?></p>
					</div>
					<?php } } } ?>
							
			</div>
			
			
			</div>
		</div>
	
	</div>
	

<script type="text/javascript">
  $(function() {
    
    $( "#sell_acc" ).accordion({
      collapsible: true
    });
    
    $( "#buy_acc" ).accordion({
      collapsible: true
    });
    
    $('#sell_acc').hide();
    
    $('#buy_c_btn').click(function()
    {
		$('.btnbuysell').removeClass('active');
		$(this).addClass('active');
		$('.faq_acc').hide();
		$('#buy_acc').show();
		
		
	});
	
	$('#sell_c_btn').click(function()
    {
		$('.btnbuysell').removeClass('active');
		$(this).addClass('active');
		$('.faq_acc').hide();
		$('#sell_acc').show();
		
	});
		
  });
</script>	


