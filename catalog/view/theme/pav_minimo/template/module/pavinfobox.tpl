<?php $id = rand(1,10)+rand();?>
<div class="panel panel-default panel-v2 pav-infobox text-center same-height-column col-nopadding">
	<div class="item media row inner">			
		<div class="tab-content col-md-10 col-sm-12 col-xs-12">
			<?php foreach ($results as $key=> $testimonial) {  ?>
				<div class="tab-pane products-rows tabcarousel<?php echo $key; ?> slide" id="testimonial-<?php echo $key;?>">
					<div class="row inner">
						<div class="t-image col-md-7 col-sm-7"><img alt="<?php echo $testimonial['name']; ?>" class="img-responsive" src="<?php echo $testimonial['large_thumb']; ?>"/></div>
						<div class="t-body col-md-5 col-sm-5">						
							<div class="panel-heading">
								<h4 class="panel-title"><?php echo $heading_title; ?></h4>
							</div>
							<div class="description"><?php echo html_entity_decode($testimonial['description'][$languageID], ENT_QUOTES, 'UTF-8'); ?></div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="col-md-2 col-sm-12 col-xs-12 htabs">
			<ul class="nav nav-nostyle" id="testimonial-<?php echo $id; ?>">
				<?php foreach ($results as $key => $testimonial) {  ?>
					<li>
						<a href="#testimonial-<?php echo $key ;?>" data-toggle="tab">
							<div class="testimonial-item">
								<div class="t-avatar"><img class="img-circle" alt="<?php echo $testimonial['name']; ?>" src="<?php echo $testimonial['thumb']; ?>"/></div>			
								<h6 class="t-name"><?php echo $testimonial['name']; ?></h6>
								<div class="t-job font-size-14"><?php echo $testimonial['job']; ?></div>
							</div>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function () {
$('#testimonial-<?php echo $id; ?>  a:first').tab('show');
})
</script>


