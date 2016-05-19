<?php //echo '<pre>';print_r($story_data);die;  ?>    
    <div class="dashboard-heading">
		<h2>
			<?php echo $page_title; ?>
		</h2>
		<a href="javascript:void(0);" id="add_story" class="add-user" ><i></i><span>Add Success Story</span></a>
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
										Name 
									</h1>
								
                            </th>
                            <th>
								
									<h1 class="">
										Message
									</h1>
								
                            </th>						
							<th> 
									<h1 class=""> 
										Image 
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
                                        //  echo '<pre>';print_r($story_data);
								
                        if(!empty($story_data)) { foreach($story_data as $story) 
                        {
							if($story['status'] == 1)
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
									
									<span ><?php echo $story['name']; ?>
									</span>
									
								</td>
																							
								<td class="type_case">
									
									<span ><?php if(strlen($story['message']) > 20 ){ echo substr($story['message'],0,18).'...';} ?>
									</span>
									
								</td>								
								<td class="type_case">
									
									<span ><img src="<?php echo base_url()?>uploads/stories/<?php echo $story['image'] ?>" height="50" width="50">
									</span>
									
								</td>
																
								<td class="user-center">
									<a class="change_status" data-id="<?php echo $story['story_id'] ?>" data-sid="<?php echo $story['status']?>"  href="javascript:void(0);">
										<img src='<?php echo $img;?>' title='<?php echo $title; ?>' style="cursor:pointer"/>
									</a>
								</td>					
								
								<td class="action-main-block">
									<a title="Edit Story" data-id="<?php echo $story['story_id']; ?>" class="edit edit_story">&nbsp;</a>
									<a title="Delete story" data-id="<?php echo $story['story_id']; ?>" class="del delstory">&nbsp;</a>
								</td>							   
								
							</tr>
							<?php $sn++; } } else { ?>
							<tr>
								<td colspan="4" style='text-align:center;'>No result found.</td>
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
				
				$('#add_story').on('click',function(){
					window.location.href = base_url+'cdadmin/addSuccessStory';
				});
				
				
				
				$('.edit_story').on('click',function(){
					
					var story_id = $(this).attr('data-id');
					if(story_id){
						window.location.href= base_url+"cdadmin/editSuccessStory/"+story_id;
					}
					else{
						return false;
					}		
				});
				
				$('.change_status').click(function()
				{
					var id = $(this).attr('data-id');
					var sid = $(this).attr('data-sid');
					if(confirm('Are you sure, you want to change Story status?'))
					{
							window.location.href = base_url+'cdadmin/changeStoryStatus/'+id+'/'+sid;
							
					}
				});
				$('.delStory').click(function()
				{
					var id = $(this).attr('data-id');
					if(confirm('Are you sure, you want to delete this story?'))
					{
						window.location.href = base_url+"cdadmin/deleteSuccessStory/"+id;
					}
				});
			});</script>
		
