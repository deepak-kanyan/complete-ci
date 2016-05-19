<div class="dashboard-heading">
		<h2>
			<?php echo $page_title; ?>
		</h2>
		<a href="javascript:void(0);" id="add_position" class="add-user" ><i></i><span>Add Question Answer</span></a>
    </div>

    <div class="dashboard-inner">
        <div class="dash-search">                       
        </div>

        <div class="main-dash-summry Edit-profile nopadding11">
            <!--table-->
            <div class="my_table_div">
                <table class="fixes_layout">
                    <thead>
                        <tr>
                            <th class="forWidthSno"> <h1 class=""> S.No. </h1> </th>
                            <th>
								
									<h1 class="">
										 Category 
									</h1>
								
                            </th>
                            <th>
								
									<h1 class="">
										Question 
									</h1>
								
                            </th>
                            <th>
								
									<h1 class="">
										Answer
									</h1>
								
                            </th>						
							
							<th class="user-center"> <h1 class=""> Status </h1> </th>
							<th> 
									<h1 class=""> 
										Action 
									</h1> 
							</th>
							                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                          //echo '<pre>';print_r($category_data);
								
                        if(!empty($faq_data)) { foreach($faq_data as $faq) 
                        {
							if($faq['status'] == 1)
							{
								$img = base_url().'assets/cdadmin/images/status-active.png';
								$title="Active";
							}
							else
							{
								$img = base_url().'assets/cdadmin/images/status-inactive.png';
								$title="Inactive";
							} 
																
							?>
							<tr>
								<td>
									<?php echo $sn; ?>
								</td>
								
								<td class="type_case">
									
									<span >
									<?php switch($faq['category_id']){
										case 1: 
										echo 'sell';
										break;
										case 2:
										echo 'buy';
									}
									 ?>
									</span>
									
								</td>
																
								<td class="type_case">
									
									<span ><?php echo $faq['question'];?>
									</span>
									
								</td>
																
								<td class="type_case">
									
									<span ><?php if(strlen($faq['answer']) > 20 ){ echo substr($faq['answer'],0,18).'...';}
									else
									{
										echo $faq['answer'];
									}
									 ?>
									</span>
									
								</td>								
								
								
								<td class="user-center">
									<a class="change_status" data-id="<?php echo $faq['id'] ?>" data-sid="<?php echo $faq['status']?>"  href="javascript:void(0);">
										<img src='<?php echo $img;?>' title='<?php echo $title; ?>' style="cursor:pointer"/>
									</a>
								</td>					
								
								<td class="action-main-block">
									<a title="Edit Category" data-id="<?php echo $faq['id']; ?>" class="edit edit_position">&nbsp;</a>
									<a title="Delete Category" data-id="<?php echo $faq['id']; ?>" class="del delposition">&nbsp;</a>
								</td>							   
								
							</tr>
							<?php $sn++; } } else { ?>
							<tr>
								<td colspan="6" style='text-align:center;'>No result found.</td>
							</tr>
							<?php } ?>
						</tbody>

					</table>
					<!--end-->
				</div>
				<div class='pagination'>
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
		<style>
			.up_icon {
				  height: 20px;
				}
			
			
			.my_table_div .action-main-block a{
			border-radius: 3px;
			width: 33px;}
			
			.wide > span {
			text-transform: capitalize;
		}
		
		.edit_popup{display:none;}
		.thera_access, .thera_access_edit{
		  margin-top: 10px;
		}
		</style> 
		
		<script>
			
			$(document).ready(function(){
				var base_url = '<?php echo base_url(); ?>';
				
				$('#add_position').on('click',function(){
					window.location.href = base_url+'cdadmin/addFaq';
				});
				
				
				
				$('.edit_position').on('click',function(){
					
					var faq_id = $(this).attr('data-id');
					if(faq_id){
						window.location.href= base_url+"cdadmin/editFaq/"+faq_id;
					}
					else{
						return false;
					}		
				});
				
				$('.change_status').click(function()
				{
					var id = $(this).attr('data-id');
					var sid = $(this).attr('data-sid');
					if(confirm('Are you sure, you want to change faq status?'))
					{
							window.location.href = base_url+'cdadmin/changeFaqStatus/'+id+'/'+sid;
							
					}
				});
				$('.delposition').click(function()
				{
					var id = $(this).attr('data-id');
					if(confirm('Are you sure, you want to delete faq?'))
					{
						window.location.href = base_url+"cdadmin/deletefaq/"+id;
					}
				});
			});</script>
		
