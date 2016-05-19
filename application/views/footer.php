<!-----footer block----->
	<div id="contact_us" class="footer-top">
		<div class="wrapper">
			<div class="address wow fadeIn">
				<h2>Address</h2>
				<h3>Car2udirect.com</h3>
				<p>Sevenoaks Rd <br/>Sevenoaks TN14 7HR, UK</p>
				<p><span>Phone:</span> 	+44 555 555 555 <br/> <span>E-mail:</span>	info@car2udirect .com</p>
				<div class="follow-us">
					<h6>Follow us:</h6>
					<div class="s-links">
						<a target="_blank" href="http://www.facebook.com"><img src="<?php echo base_url(); ?>assets/frontend/images/fb.png"/></a>
						<a target="_blank" href="http://www.twitter.com"><img src="<?php echo base_url(); ?>assets/frontend/images/tw.png"/></a>
						<a target="_blank" href="http://www.linkedin.com/"><img src="<?php echo base_url(); ?>assets/frontend/images/in.png"/></a>
					</div>
				</div>
			
			</div>
			<div class="links wow fadeIn">
				<h2>Main Menu</h2>
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home </a></li>       
					<li><a href="<?php echo base_url(); ?>about">About </a></li>     					      					    
					<li><a href="<?php echo base_url(); ?>privacy">Privacy </a></li>					
					<li><a href="<?php echo base_url(); ?>terms">Terms </a></li>       					      					    
					<li><a href="<?php echo base_url(); ?>faq">Faq </a></li>       					      					    					     
				</ul>
			</div>
			<div class="form-footer wow fadeIn">
				<h2>Ask a question</h2>
				<div class="message-main error hide" id="error-msg"><span class="fa fa-close "></span><b>Message could not sent. Network error.</b> <a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>
				<div class="message-main success hide" id="success-msg"><span class="fa fa-check "></span><b>Your message has sent successfully.</b><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>
					
				
				<form name="query_form" id="query_form" method="POST">
					<div class="footer-form">
						<div class="row">
							<div class="left"><input type="text" placeholder="Name" name="name" id="name"></div>
							<div class="right"><input type="text" placeholder="Email" name="email" id="email"></div>
						</div>
						<div class="row">
							<textarea name="question" id="question" placeholder="Your question"></textarea>
						</div>
						<div class="row">
							<input type="submit" class="footer-sub-btn" id="send_btn" name="send" value="Send">
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<!-----footer block----->
	<!-----footer main block----->
	<span class="loader hide" id="loading">
		<img src="<?php echo base_url(); ?>assets/cdadmin/images/loading.gif">
	</span>
	<footer>
		<div class="wrapper">
			<p>&copy; Copyright <?php echo date('Y'); ?> Cars2udirect.com. All rights reserved. </p>
		</div>
	</footer>
	<!-----footer main block----->
<script>
$(function() {
			$("#send_btn").click(function() {
					$("#query_form").validate({
						rules: {
							name:'required',
							email: {
								required:true,
								email:true
							},
							question:'required',
						},
						messages:{
							name:'Please enter your name.',
							email:{
								required:'Please enter your email address.',
								email:'Please enter valid email address.'
							},
							question:'Please enter your question.'
						},
						errorElement:"label",
						errorClass:"error",
						submitHandler: function(form) {
							form.submit();
							}
					});
			if ($("#query_form").valid()) {    
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>home/send_question',
					data: $('#query_form').serialize(),
					success: function(res) {
						if(res==1) {
							$("#success-msg").show();
							$("#query_form")[0].reset();
						} else if(res==0) {
							$("#error-msg").show();
						}
					} 
				});
				return false;
			}
		});
		
		$('.fa-close').click(function()
		{
			$('.message-main').hide('slow');
		});
		
});
</script>
