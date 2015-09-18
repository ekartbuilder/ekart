<?php 
	  //	echo '<pre>'.print_r( $layouts, 1 );die; 
$objlang = $this->registry->get('language');
?>
<div class="box bannerbuilder <?php echo $class ?>">
	<?php if( trim($heading) ){ ?>
	<div class="box-heading"><span><?php echo $objlang->get(trim($heading)); ?></span></div>
	<?php } ?>
	<div class="pts-bannerbuilder clearfix">
 	
 		<?php  $level = 1; $rows = $layouts; require( $template_builder ); ?>
	</div>
</div>	
