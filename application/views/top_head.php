<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title><?php if(isset($title)){ echo $title; } ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/style.css?<?php echo time(); ?>"/>
<link href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/frontend/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/frontend/css/jquery.bxslider.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/frontend/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/frontend/css/jquery.fancybox.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/frontend/css/select-theme-default.css" rel="stylesheet" type="text/css">

<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-2.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.datetimepicker.full.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.bxslider.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/wow.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.fancybox.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/tether.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/select.js"></script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3srvXljmgGX5XzmBrK7iHAKR9sdIPv1X";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

<script>
	$(function(){ $('.new_sel').each(function(){ 
			
			new Select({ el: this, className: $(this).attr('data-className') }); 
		
		}); 
		
	});
</script>
