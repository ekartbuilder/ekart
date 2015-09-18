<?php $objlang = $this->registry->get('language');?>
<div id="pav-verticalmenu" class="nopadding pav-verticalmenu">
	<div class="box-heading">
		<span><?php echo $objlang->get("Verticalmenu"); ?></span>
	</div>
	<div class="box-content">
		<div id="verticalmenu" class="verticalmenu" role="navigation">
			<div class="navbar navbar-vertical">
				<div class="navbar-header">
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<?php echo $treemenu; ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>