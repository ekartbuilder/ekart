<?php if ( $width)  { ?>
	<div class="widget-blogs <?php $addition_cls?> <?php if ( isset($stylecls)&&$stylecls) { ?>box-<?php echo $stylecls; ?><?php } ?>">
		<?php if( $show_title ) { ?>
		<h3 class="menu-title"><span><?php echo $heading_title?></span></h3>
		<?php } ?>
		<div class="widget-inner block_content">
			<div class="g-plusone" data-size="<?php echo $size?>" data-annotation="<?php echo $annotation; ?>" data-width="<?php echo $width;?>"></div>
		</div>
	</div>
<?php } ?>
 
<script type="text/javascript">
  window.___gcfg = {lang: 'en-US'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
 