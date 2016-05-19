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
								<label class="required">Category :  </label>
								<span class='reg_span'>
									<select name="category" id="category">
									<option value="">Select Category</option>
									<option value="1">Sell</option>
									<option value="2">Buy</option>
									</select>
								</span>
							</div>
						</div>
					</div>
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Question :  </label>
								<span class='reg_span'>
									<input type="text" id="question" class="inputbox-main" name="question" placeholder="Enter question"></span>
							</div>
						</div>
					</div>
					
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Answer :  </label>
								<span class='reg_span height-auto margin-bottom'><textarea rows="10" cols="76" id="answer" name="answer"></textarea></span>
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
				question: "required",
				answer: "required",
				category: "required"
			},
		   
			messages: {
				question: "Enter question",
				answer: "Enter answer",
				category: "Enter category"
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
		location.assign("<?php echo base_url(); ?>cdadmin/faq");
	  } 
	</script>

