<div class="box category pavblog-category">
	<div class="box-heading"><i class="fa fa-align-justify"></i><span><?php echo $heading_title; ?></span></div>
	<div class="box-category list" id="pav-categorymenu" >

		 <?php echo $tree;?>
		 
	</div>
 </div>
<script>
$(document).ready(function(){
	$("#pav-categorymenu ul").addClass("list");
		// applying the settings
		$("#pav-categorymenu li.active span.head").addClass("selected");
			$('#pav-categorymenu ul').Accordion({
				active: 'span.selected',
				header: 'span.head',
				alwaysOpen: false,
				animated: true,
				showSpeed: 400,
				hideSpeed: 800,
				event: 'click'
			});
});

</script>