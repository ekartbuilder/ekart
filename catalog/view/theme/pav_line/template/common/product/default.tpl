<?php 
	$objlang = $this->registry->get('language');  
	$ourl = $this->registry->get('url');

	$button_compare = $objlang->get("button_compare");
	$button_wishlist = $objlang->get("button_wishlist");
?>
<div class="product-block default" itemtype="http://schema.org/Product" itemscope>
	<?php if ($product['thumb']) {    ?>	      	
    	<div class="image">
    		<?php if( $product['special'] ) {   ?>
	    		<span class="product-label product-label-special"><span class="special"><?php echo $objlang->get( 'text_sale' ); ?></span></span>
	    	<?php } ?>
			<a class="img" href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" class="img-responsive" /></a>
			<div class="right">
				<div class="action">
					<div class="quick-view col-lg-6 col-md-3 col-xs-3">
						<?php if ( isset($quickview) && $quickview ) { ?>
							<a class="quickview btn btn-highlighted iframe-link" href="<?php echo $ourl->link('themecontrol/product','product_id='.$product['product_id']);?>" title="<?php echo $objlang->get('quick_view'); ?>">
								<i class='fa-fw fa fa-eye'></i>
								<span class="hidden-md hidden-sm hidden-xs"><?php echo $objlang->get('quick_view'); ?></span>
							</a>
						<?php } ?>
					</div>
					<div class="wishlist col-lg-2 col-md-3 col-xs-3">
						<a class="btn btn-highlighted fa fa-heart" title="<?php echo $button_wishlist; ?>" onclick="wishlist.addwishlist('<?php echo $product['product_id']; ?>');"><span><?php echo $button_wishlist; ?></span></a>
					</div>
					<div class="compare col-lg-2 col-md-3 col-xs-3">
						<a class="btn btn-highlighted fa fa-files-o" title="<?php echo $button_compare; ?>" onclick="compare.addcompare('<?php echo $product['product_id']; ?>');"><span><?php echo $button_compare; ?></span></a>
					</div>
					<div class="zoom col-lg-2 col-md-3 col-xs-3">
						<!-- zoom image-->
					    <?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
					    	<a href="<?php echo $zimage;?>" class="fa fa-search-plus btn btn-highlighted product-zoom" title="<?php echo $product['name']; ?>">
					    </a>
					    <?php } ?>
					</div>
				</div>
			</div>				
		</div>
	<?php } ?>
	
	<div class="product-meta">
		<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
		<?php if( isset($product['description']) ){ ?> 
			<div class="description" itemprop="description"><?php echo utf8_substr( strip_tags($product['description']),0,220);?>...</div>
		<?php } ?>	
		<div class="bottom">
			<?php if( !isset($listingConfig['catalog_mode']) || !$listingConfig['catalog_mode'] ) { ?>
			<div class="cart">
				<button data-loading-text="Loading..." type="button" value="<?php echo $button_cart; ?>" onclick="cart.addcart('<?php echo $product['product_id']; ?>');" class="btn btn-shopping-cart btn-outline-small"><span class="hidden-lg"><i class="fa-fw fa fa-shopping-cart"></i></span><span class="hidden-md"><?php echo $button_cart; ?></span></button>		
			</div>
			<?php } ?>
			
			<div class="wrap-hover">
				<?php if ( isset($product['rating']) ) { ?>
		          	<div class="rating">
			            <?php for ($is = 1; $is <= 5; $is++) { ?>
			            <?php if ($product['rating'] < $is) { ?>
			            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
			            <?php } else { ?>
			            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i>
			            </span>
			            <?php } ?>
			            <?php } ?>
		          	</div>
	         	<?php } ?>

	         	<?php if ($product['price']) { ?>
				<div class="price" itemtype="http://schema.org/Offer" itemscope itemprop="offers">
					<?php if (!$product['special']) {  ?>
						<span class="special-price"><?php echo $product['price']; ?></span>
						<?php if( preg_match( '#(\d+).?(\d+)#',  $product['price'], $p ) ) { ?> 
						<meta content="<?php echo $p[0]; ?>" itemprop="price">
						<?php } ?>
					<?php } else { ?>
						<span class="price-new"><?php echo $product['special']; ?></span>
						<span class="price-old"><?php echo $product['price']; ?></span> 
						<?php if( preg_match( '#(\d+).?(\d+)#',  $product['special'], $p ) ) { ?> 
						<meta content="<?php echo $p[0]; ?>" itemprop="price">
						<?php } ?>
					<?php } ?>
					<meta content="<?php // echo $this->currency->getCode(); ?>" itemprop="priceCurrency">
				</div>
				<?php } ?>
			</div>
		</div>	
	</div>

</div>




