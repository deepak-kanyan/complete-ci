<?php 
	$sort_arrow_name='fa fa-angle-down menu-down';
	$sort_arrow_email='fa fa-angle-down menu-down';
	$sort_arrow_contact='fa fa-angle-down menu-down';
	$sort_arrow_price='fa fa-angle-down menu-down';
	
	$page  = isset($page) && $page != 0 ? $page : 0;
	$srno = isset($offset) ? $offset+1 : 1;
	if(isset($search))
	{
		if (strpos($search,'_') !== false)
		{
			$search = explode('_',$search);
			if(count($search) > 0)
			{
				$search = $search[0].' '.$search[1];
			}
		}
		else
		{
			$search = $search;
		}
	}
	else
	{
		$search = '';
	}
	$order = isset($order) && $order == 'asc' ? 'desc' : 'asc';
	$sort_arrow_name = isset($sort) && $sort=='name' ? ($order == 'asc' ? 'fa fa-angle-down menu-down' : 'fa fa-angle-up menu-down'): 'fa fa-angle-down menu-down';
	$sort_arrow_email = isset($sort) && $sort=='email' ? ($order == 'asc' ? 'fa fa-angle-down menu-down' : 'fa fa-angle-up menu-down'): 'fa fa-angle-down menu-down';
	
	$sort_arrow_contact = isset($sort) && $sort=='phone' ? ($order == 'asc' ? 'fa fa-angle-down menu-down' : 'fa fa-angle-up menu-down'): 'fa fa-angle-down menu-down';
	
	$sort_arrow_price = isset($sort) && $sort=='price' ? ($order == 'asc' ? 'fa fa-angle-down menu-down' : 'fa fa-angle-up menu-down'): 'fa fa-angle-down menu-down';
	
	
	
?>
<div class="dashboard-heading">
	<h2><?php echo $title; ?></h2>	
</div>
<div class="dashboard-inner">
	<div class="dash-search">
		<input type='text' name='search' id='search' value='<?php echo $search; ?>' class='list-search' placeholder='Email' />
		<button class="btn-submit btn" onclick='search()'>
			<span> <i class="fa fa-search search-icon"></i></span>
			Search
		</button>
	</div>

<div class="main-dash-summry Edit-profile nopadding11">
	<div class="my_table_div">
		<table class="fixes_layout" id="users_table">
			<thead>
				<tr>
					<th > <h1 class=""> S. No. </h1> </th>					
					
					<th>
						<a class='underline_classs' href='<?php echo base_url(); ?>cdadmin/subscribers/0/<?php echo $order; ?>/<?php echo $search; ?>/sort/email/'>
						<h1 class="">
							Email <i class="<?php echo $sort_arrow_email; ?>"></i>
						</h1>
						</a>
					</th>
					<th>Date</th>
					<th style="">
						<h1> Status	</h1>						
					</th>										
					<th> <h1> Actions </h1> </th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(isset($sub_data) && count($sub_data) > 0) {
						foreach($sub_data as $td){
							
							
							if($td['status'] == 1)
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
								<td><?php echo $srno; ?></td>
								
								
								<td class="email_word"><?php echo $td['email']; ?></td>								
								<td class="email_word"><?php echo date('Y-m-d',strtotime($td['create_date'])); ?></td>								
								<td>
									
									<a class="change_status" data-id="<?php echo $td['sub_id'] ?>" data-sid="<?php echo $td['status']?>"  href="javascript:void(0);">
										<img src='<?php echo $img;?>' title='<?php echo $title; ?>' style="cursor:pointer"/>
									</a>
									
								</td>
								<td class="action-main-block">
									<a title="Delete Subscribers" data-id="<?php echo $td['sub_id']; ?>" class="del delposition">&nbsp;</a>
								</td>
							</tr>
					<?php $srno++; } } else { ?>
					<tr>
						<td colspan="4" style='text-align:center;'>No result found.</td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
			<!--end-->
	</div><!-- my_table_div -->
	<div class='pagination' style='text-align:center'>
		<?php echo $this->pagination->create_links(); ?>
	</div>
</div>
</div>
<script type="text/javascript">
function search()
{
	var search = $('#search').val();
	document.location.href = '<?php echo base_url(); ?>cdadmin/subscribers/0/<?php echo $order ;?>/'+search;
}
</script>

<script>
			
			$(document).ready(function(){
				
				var base_url = '<?php echo base_url(); ?>';
			
				$('.change_status').click(function()
				{
					var id = $(this).attr('data-id');
					var sid = $(this).attr('data-sid');
					
					window.location.href = base_url+'cdadmin/change_sub_status/'+id+'/'+sid;
							
					
				});
				$('.delposition').click(function()
				{
					var id = $(this).attr('data-id');
					if(confirm('Are you sure, you want to delete subscriber ?'))
					{
						window.location.href = base_url+"cdadmin/delete_subscriber/"+id;
					}
				});
			});</script>
