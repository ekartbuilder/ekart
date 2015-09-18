<?php 
$objlang = $this->registry->get('language');
?>
<div class="panel panel-default">
	<?php if( trim($heading) ){ ?>
	<div class="panel-heading"><h4 class="panel-title"><?php echo $objlang->get(trim($heading)); ?></h4></div>
	<?php } ?>
	<div id="pts-bannerbuilder<?php echo rand(1,90000); ?>" class="clearfix <?php echo $class ?>">
 	
 		<?php  $level = 1; $rows = $layouts; require( $template_builder ); ?>
	</div>
</div>	
