<?php $objlang = $this->registry->get('language');?>
<?php if( count($testimonials) ) { ?>
	<?php $id = rand(1,10)+rand();?>
   	<div id="pavtestimonial<?php echo $id;?>" class="carousel slide testimonials panel panel-default <?php echo $setting['class'];?>">
   		<div class="panel-heading">
			<h4 class="panel-title"><?php echo $objlang->get("text_testimonial");?></h4>
		</div>
		<div class="panel-body">
			<div class="carousel-inner">
				<?php $pages = array_chunk( $testimonials, $row); $span = 12/$cols; ?>
				<?php foreach ($pages as  $k => $testimonials ) { ?>
					<div class="item <?php if($k==0) {?>active<?php } ?>">
						<?php foreach ($testimonials as $i => $testimonial) {  ?>
							<?php if( $i++%$cols == 0 ) { ?>
							<div class="row">
							<?php } ?>
				 				<div class="col-md-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-12 column">
				 					<div class="testimonial-item">
				 						<?php if(  $testimonial['thumb'] ) { ?>
				 						<div class="testimonials-avatar"><img  alt="<?php echo strip_tags($testimonial['profile']); ?>" src="<?php echo $testimonial['thumb']; ?>" class="img-circle"/></div>
				 						<?php } ?>
										<?php if(  $testimonial['description'] ) { ?>
										<div class="testimonials-description">
											<?php echo $testimonial['description'];?>
										</div>
										<?php } ?>									
										<?php if(  $testimonial['profile'] ) { ?>										
										<div class="profile"><?php echo $testimonial['profile']; ?></div>
										<?php } ?>
										<?php if( $testimonial['video_link']) { ?>
										<a class="colorbox-t" href="<?php echo $testimonial['video_link'];?>"><?php echo $this->language->get('text_watch_video_testimonial');?></a>
										<?php } ?>
									</div>
								</div>
							<?php if( $i%$cols == 0 || $i==count($testimonials) ) { ?>
							</div>
							<?php } ?>
						<?php } ?>
					</div>
				<?php }?>			
			</div>
			<?php if( count($testimonials) / $cols > 0 ){ ?>
				<div class="carousel-controls carousel-center">
					<a class="carousel-control left" href="#pavtestimonial<?php echo $id;?>" data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="carousel-control right" href="#pavtestimonial<?php echo $id;?>" data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>
			<?php } ?>		
    	</div>
    </div>
    <?php if( count($testimonials) / $cols > 0 ){ ?>
	<script type="text/javascript">
	<!--
		$('#pavtestimonial<?php echo $id;?>').carousel({interval:<?php echo ( $auto_play_mode?$interval:'false') ;?>,auto:<?php echo $auto_play;?>,pause:'hover'});
	-->
	</script>
	<?php } ?>
	<script type="text/javascript"><!--
		$(document).ready(function() {
		  $('.colorbox-t').magnificPopup({iframe:true, innerWidth:640, innerHeight:390});
		});
//--></script> 
<?php } ?>
