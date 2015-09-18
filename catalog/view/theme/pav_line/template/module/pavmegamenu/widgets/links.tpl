<?php if( isset($links) ){ ?>
 <div class="widget-images <?php echo $addition_cls ?>  <?php if( isset($stylecls)&&$stylecls ) { ?>box-<?php echo $stylecls;?><?php } ?>">
	<?php if( $show_title ) { ?>
	<h3 class="menu-title"><?php echo $heading_title?></h3>
	<?php } ?>
	<div class="widget-inner clearfix">
		<div id="tabs<?php echo $id;?>" class="panel-group">
			

			<ul class="nav-links" id="myTab">
			  <?php foreach( $links as $key => $ac ) { ?>
			  <li ><a href="<?php echo $ac['link'];?>" ><?php echo $ac['text'];?></a></li>
			  <?php } ?>
			</ul>


		</div>
	</div>
</div>
<?php } ?>