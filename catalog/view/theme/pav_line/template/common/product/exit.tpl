<?php 
	$objlang = $this->registry->get('language');  
	$ourl = $this->registry->get('url');

	$button_compare = $objlang->get("button_compare");
	$button_wishlist = $objlang->get("button_wishlist");
?>
<div class="product-block exit" itemtype="http://schema.org/Product" itemscope>
	<div class="block-img">
		<?php if ($product['thumb']) {    ?>
	      	<?php if( $product['special'] ) {   ?>
	    	<span class="product-label product-label-special"><span class="special"><?php echo $objlang->get( 'text_sale' ); ?></span></span>
	    	<?php } ?>
	    	<div class="image">
				<a class="img" href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" class="img-responsive" /></a>
				
			</div>
		<?php } ?>
		<div class="right">
			<div class="action"> 	
		    	<div class="wishlist">					
					<a class="btn btn-inverse fa fa-heart" title="<?php echo $button_wishlist; ?>" onclick="wishlist.addwishlist('<?php echo $product['product_id']; ?>');"><span class="hidden"><?php echo $button_wishlist; ?></span></a>	
				</div>
				<div class="compare">										
					<a class="btn btn-inverse fa fa-refresh" title="<?php echo $button_compare; ?>" onclick="compare.addcompare('<?php echo $product['product_id']; ?>');"><span class="hidden"><?php echo $button_compare; ?></span></a>	
				</div>	
				<!-- zoom image-->
				
			    <?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
			    <div class="zoom">
				    <a href="<?php echo $zimage;?>" class="product-zoom btn btn-inverse fa fa-search-plus" title="<?php echo $product['name']; ?>">
				    </a>
			    </div>
			    <?php } ?>
			</div>
		</div>
	</div>
	
	<div class="product-meta">
		<div class="meta">
			<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>			
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
			<?php if( isset($product['description']) ){ ?> 
				<div class="description" itemprop="description"><?php echo utf8_substr( strip_tags($product['description']),0,220);?>...</div>
			<?php } ?>		
		</div>
		<div class="action-btn">
			<?php if( !isset($listingConfig['catalog_mode']) || !$listingConfig['catalog_mode'] ) { ?>
			<div class="cart">
				<button data-loading-text="Loading..." type="button" value="<?php echo $button_cart; ?>" onclick="cart.addcart('<?php echo $product['product_id']; ?>');" class="btn btn-danger"><i class="fa-fw fa fa-shopping-cart"></i><span><?php echo $button_cart; ?></span></button>		
			</div>
			<?php } ?>
			<?php if ( isset($quickview) && $quickview ) { ?>
			<div class="quick-view">
				<a class="quickview btn btn-default iframe-link" href="<?php echo $ourl->link('themecontrol/product','product_id='.$product['product_id']);?>" title="<?php echo $objlang->get('quick_view'); ?>">
					<i class='fa-fw fa fa-eye'></i><span><?php echo $objlang->get('quick_view'); ?></span>
				</a>
			</div>
			<?php } ?>
		
		</div>

	</div>

</div>





