 <?php //echo '<pre>';print_r($all_templates);die; ?>
	<form method="post" name="frmEmailTemplate" id="frmEmailTemplate" enctype="multipart/form-data"> 
		<div class="account-right-div">
			<div class="dashboard-heading">
				<h2>
					<?php echo $page_title; ?>
				</h2>
			</div>
			<?php
				$from_name = $from_email = $template_body = $id = '';
				if(isset($template_detail['id'])) $id = $template_detail['id'];
				if(isset($template_detail['from_name'])) $from_name = $template_detail['from_name'];
				if(isset($template_detail['from_email'])) $from_email = $template_detail['from_email'];
				if(isset($template_detail['template_body'])) $template_body = htmlspecialchars_decode($template_detail['template_body']);
			?>
			<div class="dashboard-inner">
				<div class="main-dash-summry Edit-profile">
									
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Category :  </label>
								<span class='reg_span'>
									<?php $category = array('Sell','Buy'); $i=1?>
									<select name="category" id="category">
										<option value="">Select Category</option>
										<?php foreach($category as $cat){ 
										if($faq_data['category_id'] == $i) $select = 'selected'; else $select = ''; 
										?>
										<option value="<?php echo $i ?>" <?php echo $select?>><?php echo $cat?></option>
									<?php $i++; } ?>
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
									<input type="text" id="question" class="inputbox-main" name="question" placeholder="Enter question" value="<?php echo $faq_data['question'] ?>"></span>
							</div>
						</div>
					</div>
					
					<div class="input-row full-input-width">
						<div class="full">
							<div class="input-block">
								<label class="required">Answer :  </label>
								<span class='reg_span height-auto margin-bottom'><textarea rows="10" cols="76" id="answer" name="answer"><?php echo $faq_data['answer'] ?></textarea></span>
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

