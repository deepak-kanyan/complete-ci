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
					<?php //print_r($story_data); die; ?>				
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Name :  </label>
								<span class='reg_span'>
									<input type="text" id="name" class="inputbox-main" name="name" placeholder="Enter Name" value="<?php echo $story_data['name']; ?>"></span>
							</div>
						</div>
					</div>
					
					
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Message :  </label>
								<span class='reg_span height-auto margin-bottom'><textarea rows="10" cols="76" id="message" class="" name="message"><?php echo $story_data['message']; ?></textarea></span>
							</div>
						</div>
					</div>
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Image :  </label>
								<span class='reg_span'>
									<input type="file" id="story_image" name="story_image">
									<img style="margin-top:-10px" src="<?php echo base_url()?>uploads/stories/<?php echo $story_data['image'] ?>" height="50" width="50">
								</span>
									
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
			},
		   
			messages: {
				name: "Enter name",
				message: "Enter message",
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
