<?php require( PAVO_THEME_DIR."/template/common/config_layout.tpl" );  ?>
<div class="container">
    <div class="breadcrumbs light-style breadcrumbs-center bg-category space-padding-tb-40 font-size-12">      
        <?php $tmp = $breadcrumbs;  $end = array_slice($tmp , count($tmp)-1 ); ?>
        <h1 class="letter-spacing-2"><?php echo $end[0]['text'] ?></h1>
        <?php if( isset($breadcrumbs) ) { ?>
	    <ul class="list-unstyled breadcrumb-links">
	   		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
	   		<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
	   		<?php } ?>
	   	</ul>
  	<?php } ?>
    </div>
</div>