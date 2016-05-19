 <?php //echo date('Y-m-d H:i:s'); ?>
	<form method="post" name="frmEmailTemplate" id="frmEmailTemplate" enctype="multipart/form-data"> 
		<div class="account-right-div">
			<div class="dashboard-heading">
				<h2>
					<?php echo $page_title; ?>
				</h2>
			</div>
			<div class="dashboard-inner">
				<div class="main-dash-summry Edit-profile">
									
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Name :  </label>
								<span class='reg_span'>
									<input type="text" id="name" class="inputbox-main" name="name" placeholder="Enter Name">
									</span>
							</div>
						</div>
					</div>
					
					
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Message :  </label>
								<span class='reg_span height-auto margin-bottom'><textarea rows="10" cols="76" id="message" class="" name="message"></textarea></span>
							</div>
						</div>
					</div>
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Image :  </label>
								<span class='reg_span'>
									<input type="file" id="story_image" name="story_image" value=""></span>
							</div>
						</div>
					</div>
					
					<div class="input-row">
						<div class="full">
							<div class="input-block">
								<label> &nbsp; </label>
								<span class='reg_span reg_span_btn'><input type="submit" value="Submit" class="btn-submit btn">
								<input type="button" value="Cancel" onclick="cancelButton()" class="btn-submit btn">
								 </span>
							</div>
						</div>	
					</div>
					
					
				</div>
			</div>
		</div>
	</form>
	
<script type="text/javascript">
	
	  $(function() {
		$("#frmEmailTemplate").validate({
			ignore:[],
			rules: {
				name: "required",
				message: "required",
				story_image: "required"
			},
		   
			messages: {
				name: "Enter name",
				message: "Enter message",
				story_image: "Enter image"
			},
			errorElement:"div",
			errorClass:"valid-error",
			submitHandler: function(form) {
				form.submit();
			}
		});
	  });
	  
	  function cancelButton()
	  {
		location.assign("<?php echo base_url(); ?>cdadmin/successStories");
	  } 
	</script>

