<?php $objlang = $this->registry->get('language'); ?>
<?php if( !empty($blogs) ) { ?>
<div class="widget-blogs panel panel-default panel-v2 latest_blog <?php echo $addition_cls; ?> <?php if ( isset($stylecls)&&$stylecls) { ?>box-<?php echo $stylecls; ?><?php } ?>">
	<?php if( $show_title ) { ?>
	<div class="widget-heading panel-heading"><h4 class="panel-title"><?php echo $heading_title?></h4></div>
	<?php } ?>
	<div class="widget-inner panel-body space-padding-lr-0">	 
		<div class="row">
			<?php foreach( $blogs as $key => $blog ) { $key = $key + 1;?>
			<?php $style = ( $key > $cols )?"left":"right";  ?>
			<div class="col-lg-<?php echo floor(12/$cols);?> col-md-<?php echo floor(12/$cols);?> col-sm-6 col-xs-12 <?php echo $style; ?>">
				<div class="latest-posts-body">	
					<?php if( $blog['thumb']  )  { ?>			
					<div class="latest-posts-image text-center">
					  	<a class="" href="#">
							<img src="<?php echo $blog['thumb'];?>" title="<?php echo $blog['title'];?>" alt="<?php echo $blog['title'];?>" class="img-responsive"/>
							<span class="fa fa-eye"></span>
							<div class="overflow"></div>
					  	</a>
					</div>
					<?php } ?>
					<div class="latest-posts-meta text-center space-padding-30">
						<div class="posts-meta">
							<h6 class="latest-posts-title">
								<a href="<?php echo $blog['link'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
							</h6>						
							<div class="description font-size-16 space-10">
								<?php $blog['description'] = strip_tags($blog['description']); ?>
								<?php echo utf8_substr( $blog['description'],0, 130);?>...
							</div>	
							<div class="btn-more-link">
								<a href="<?php echo $blog['link'];?>" class="readmore btn btn-link"><?php echo $objlang->get('text_readmore');?></a>
							</div>
						</div>
					</div>					
				</div> <!-- end latest-posts-body -->
			</div>
			<?php if( ( $key%$cols==0 || $key == count($blogs)) ){  ?>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>