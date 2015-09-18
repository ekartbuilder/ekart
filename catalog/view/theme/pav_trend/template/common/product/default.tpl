<?php 
	$objlang = $this->registry->get('language');  
	$ourl = $this->registry->get('url');   
	$col_action=6; if($quickview) $col_action=4;
?>
<div class="product-block">
    <?php if( $product['special'] ) {   ?>
	<span class="product-label-special label"><?php echo $objlang->get( 'text_sale' ); ?></span>
	<?php } ?>
	<?php if ($product['thumb']) {    ?>
	 <div class="image">
    	<div class="face">
    		<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>"/></a>
    	</div>
    	<?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
            <a href="<?php echo $zimage;?>" class="colorbox product-zoom" title="<?php echo $product['name']; ?>"><i class="fa fa-search-plus"></i></a>
        <?php } ?>    	
	</div>
	<?php } ?>
	<div class="product-meta">
		<div class="group-item">
			<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
			<div class="option-product">
				<div class="price-cart pull-left">
					<?php if ($product['price']) { ?>
					<div class="price">
						<?php if (!$product['special']) {  ?>
							<span class="special-price"><?php echo $product['price']; ?></span>
							<?php if( preg_match( '#(\d+).?(\d+)#',  $product['price'], $p ) ) { ?> 
							<?php } ?>
						<?php } else { ?>
							<span class="price-old"><?php echo $product['price']; ?></span>
							<span class="price-new"><?php echo $product['special']; ?></span>				 
							<?php if( preg_match( '#(\d+).?(\d+)#',  $product['special'], $p ) ) { ?> 
							<?php } ?>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<?php if ( isset( $product['rating']) ) { ?>
		          <div class="rating pull-right">
		            <?php for ($is = 1; $is <= 5; $is++) { ?>
		            <?php if ($product['rating'] < $is) { ?>
		            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
		            <?php } else { ?>
		            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
		            <?php } ?>
		            <?php } ?>
		          </div>
		        <?php } ?>
			</div>			
			<?php if( isset($product['description']) ){ ?> 
				<div class="description"><?php echo utf8_substr( strip_tags($product['description']),0,80);?>...</div>
			<?php } ?>
			<div class="action">
				<div class="wishlist col-lg-<?php echo $col_action; ?> col-md-<?php echo $col_action; ?>">
					<a onclick="wishlist.addwishlist('<?php echo $product['product_id']; ?>');" title="<?php echo $objlang->get("button_wishlist"); ?>"><i class="fa fa-heart-o"></i>
						<span><?php echo $objlang->get("button_wishlist"); ?></span>
					</a>
				</div>
                <div class="compare col-lg-<?php echo $col_action; ?> col-md-<?php echo $col_action; ?>"><a onclick="compare.addcompare('<?php echo $product['product_id']; ?>');" title="<?php echo $objlang->get("button_compare"); ?>"><i class="fa fa-files-o"></i><span><?php echo $objlang->get("button_compare"); ?></span></a></div>
                <?php if ($quickview){ ?>
                <div class="product_quickview col-lg-4 col-xs-4">
					<a class="iframe-link pav-colorbox hidden-sm hidden-xs" href="<?php echo $ourl->link('themecontrol/product','product_id='.$product['product_id']);?>" data-original-title="<?php echo $objlang->get('quick_view'); ?>"><i class='fa fa-eye'></i><span><?php echo $objlang->get('quick_view'); ?></span></a>
				</div>
				<?php } ?>
			</div>			
	  	</div>
  	</div>
  	<div class="cart">
  		<?php if( !isset($listingConfig['catalog_mode']) || !$listingConfig['catalog_mode'] ) { ?>
			<button class="button" type="button" value="<?php echo $objlang->get("button_cart"); ?>" onclick="cart.addcart('<?php echo $product['product_id']; ?>');"><?php echo $objlang->get("button_cart"); ?></button>
		<?php } ?>        
    </div>
</div>





