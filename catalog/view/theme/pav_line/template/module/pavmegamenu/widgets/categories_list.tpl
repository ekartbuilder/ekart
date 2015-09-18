<?php if( $show_title ) { ?>
<h3 class="menu-title"><span><?php echo $heading_title?></span></h3>
<?php } ?>

<div class="<?php echo $addition_cls; ?>">
	<ul>
		<?php foreach ($categories_list as $category){ ?>
		<li><a href="<?php echo $category['href']; ?>"><span class="title"><?php echo $category['name']; ?></span></a></li>
		<?php } ?>
	</ul>
</div>