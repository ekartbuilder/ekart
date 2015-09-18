<?php 
	$span = 12/$cols; 
?>
<div class="box pav-block bloglatest">
	<div class="box-heading"><span><?php echo $heading_title; ?></span></div>
	<?php if( !empty($blogs) ) { ?>
	<div class="pavblog-latest clearfix">
		<?php foreach( $blogs as $key => $blog ) { $key = $key + 1;?>
		<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-12 pavblock">
			<div class="blog-item">
				<div class="blog-body clearfix">
					<div class="image clearfix">
						<?php if( $blog['thumb']  )  { ?>
						
								<img src="<?php echo $blog['thumb'];?>" title="<?php echo $blog['title'];?>" alt="<?php echo $blog['title'];?>" class="img-responsive"/>
					
						<?php } ?>						
					</div>
					<div class="group-blog">
						<div class="blog-title">
							<a href="<?php echo $blog['link'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
						</div>
						<div class="description"><p><?php $blog['description'] = strip_tags($blog['description']); ?>
							<?php echo utf8_substr( $blog['description'],0, 70)."...";?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if( ( $key%$cols==0 || $key == count($blogs)) ){  ?>
			<div class="clearfix"></div>
		<?php } ?>
		<?php } ?>
	</div>
	<?php } ?>
 </div>
