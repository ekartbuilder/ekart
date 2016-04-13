<?php $id = rand(1,10); $span =  12/$columns; ?>
   	<div id="pavcarousel<?php echo $id;?>" class="widget-carousel panel panel-default panel-v2 pavcarousel slide <?php echo $addition_cls; ?>  <?php if( isset($stylecls)&&$stylecls ) { ?>box-<?php echo $stylecls;?><?php } ?>">
		<?php if( $show_title ) { ?>
		<div class="widget-heading panel-heading"><h4 class="panel-title"><?php echo $heading_title?></h4></div>
		<?php } ?>
		<div class="panel-body">
			<div class="carousel-inner">
				<?php

				$pages = array_chunk( $banners, $itemsperpage );?>

				<?php foreach ($pages as $k => $tbanners) {?>
				<div class="item <?php if($k==0) {?>active<?php } ?>">
					<?php foreach( $tbanners as $i => $banner ) {  $i=$i+1;?>
						<?php if( $i%$columns == 1 ) { ?>
						<div class="row">
						<?php } ?>

						<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-4 product-col  space-30">
							<div class="item-inner">
								<?php if ($banner['link']) { ?>
								<a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" /></a>
								<?php } else { ?>
								<img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" />
								<?php } ?>
							</div>
						</div>

						<?php if( $i%$columns == 0 || $i==count($tbanners) ) { ?>
						</div>
						<?php } ?>
					<?php } //endforeach; banner ?>
				</div>
				<?php } //endforeach; pages?>	
			</div>

			<?php if( count($banners) > $itemsperpage ){ ?>	
			<div class="carousel-controls carousel-center">
				<a class="carousel-control left" href="#pavcarousel<?php echo $id;?>" data-slide="prev"><i class="fa fa-angle-left"></i></a>
				<a class="carousel-control right" href="#pavcarousel<?php echo $id;?>" data-slide="next"><i class="fa fa-angle-right"></i></a>
			</div>		
			<?php } ?>
		</div>
    </div>
<?php if( count($banners) > 1 ){ ?>
<script type="text/javascript"><!--
 $('#pavcarousel<?php echo $id;?>').carousel({interval:false});
--></script>
<?php } ?>