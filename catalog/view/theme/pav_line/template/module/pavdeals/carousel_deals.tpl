<?php 
	$span = 12/$cols; 
	$active = 'latest';
	$id = rand(1,9);	
	$objlang = $this->registry->get('language');
	$button_wishlist = $objlang->get('button_wishlist');
	$button_compare = $objlang->get("button_compare");
?>
<div class="<?php echo $prefix;?> box productdeals box-normal sidebar">
	<div class="box-heading"><span><?php echo $heading_title; ?></span></div>
	<div class="box-content" >
 		<div class="box-products slide" id="pavdeals<?php echo $id;?>">
			<?php if( trim($message) ) { ?>
			<div class="box-description"><?php echo $message;?></div>
			<?php } ?>
			<?php if( count($products) > $itemsperpage ) { ?>
			<div class="carousel-controls">
				<a class="carousel-control left" href="#pavdeals<?php echo $id;?>"   data-slide="prev"><i class="fa fa-angle-left"></i></a>
				<a class="carousel-control right" href="#pavdeals<?php echo $id;?>"  data-slide="next"><i class="fa fa-angle-right"></i></a>
			</div>
			<?php } ?>
			<div class="carousel-inner ">		
			<?php $pages = array_chunk( $products, $itemsperpage); ?>
			<?php foreach ($pages as  $k => $tproducts ) {   ?>

				<div class="item <?php if($k==0) {?>active<?php } ?>">
					<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
					<?php if( $i%$cols == 1 || $cols == 1) { ?> <div class="row product-items"> <?php } ?>

						<div class="product-col col-md-<?php echo $span;?> col-sm-12 col-xs-12">
							<div class="product-block">
								<div class="image">
									<a href="<?php echo $product['href']; ?>">
										<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" />
									</a>									
								</div>
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
						        <div class="description"><?php echo $product['description']; ?></div>
								<?php if ($product['price']) { ?>
								<div class="price">
									<?php if (!$product['special']) { ?>
									<?php echo $product['price']; ?>
									<?php } else { ?>
									<span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
									<?php } ?>
									<?php if (!empty($product['tax'])) { ?>
									<span class="price-tax"><?php echo $objlang->get('text_tax'); ?> <?php echo $product['tax']; ?></span>
									<?php } ?>
								</div>
								<?php } ?>
									
								<div class="action-deals">
									<div class="cart">
										<button data-loading-text="Loading..." type="button" value="<?php echo $button_cart; ?>" onclick="cart.addcart('<?php echo $product['product_id']; ?>');" class="btn btn-primary"><i class="fa-fw fa fa-shopping-cart"></i><span class="hidden"><?php echo $button_cart; ?></span></button>
									</div>
									<div class="wishlist">					
										<a class="btn btn-default" title="<?php echo $button_wishlist; ?>" onclick="wishlist.addwishlist('<?php echo $product['product_id']; ?>');"><i class="fa-fw fa fa-heart"></i><span class="hidden"><?php echo $button_wishlist; ?></span></a>	
									</div>
									<div class="compare">										
										<a class="btn btn-default" title="<?php echo $button_compare; ?>" onclick="compare.addcompare('<?php echo $product['product_id']; ?>');"><i class="fa-fw fa fa-files-o"></i><span class="hidden"><?php echo $button_compare; ?></span></a>	
									</div>									
								</div>
								<div class="count-down">									
									<!-- count down -->
									<div class="deal-qty-box hidden">
										<?php echo sprintf($objlang->get("text_quantity_deal"), $product["quantity"]);?>
									</div>

									<div class="item-detail hidden">
										<div class="timer-explain">(<?php echo date($objlang->get("date_format_short"), strtotime($product['date_end_string'])); ?>)</div>
									</div>

									<div id="item<?php echo $module; ?>countdown_<?php echo $product['product_id']; ?>" class="item-countdown"></div>
									<script type="text/javascript">
										jQuery(document).ready(function($){
											$("#item<?php echo $module; ?>countdown_<?php echo $product['product_id']; ?>").lofCountDown({
												formatStyle:2,
												TargetDate:"<?php echo date('m/d/Y G:i:s', strtotime($product['date_end_string'])); ?>",
												DisplayFormat:"<ul><li>%%D%% <div><?php echo $objlang->get("text_days");?></div></li><li> %%H%% <div><?php echo $objlang->get("text_hours");?></div></li><li> %%M%% <div><?php echo $objlang->get("text_minutes");?></div></li><li> %%S%% <div><?php echo $objlang->get("text_seconds");?></div></li></ul>",
												FinishMessage: "<?php echo $objlang->get('text_finish');?>"
											});
										});
									</script>
								</div>
								<div class="deal_detail hide">
									<ul>
										<li>
											<span><?php echo $objlang->get("text_discount");?></span>
											<span class="deal_detail_num"><?php echo $product['deal_discount'];?>%</span>
										</li>
										<li>
											<span><?php echo $objlang->get("text_you_save");?></span>
											<span class="deal_detail_num"><span class="price"><?php echo $product["save_price"]; ?></span></span>
										</li>
										<li>
											<span><?php echo $objlang->get("text_bought");?></span>
											<span class="deal_detail_num"><?php echo $product['bought'];?></span>
										</li>
									</ul>
								</div>

								
							</div>
						</div>

					<?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?> </div> <?php } ?>
					<?php } ?>
				</div>  

			<?php } ?>
			</div>  
		</div>
	</div> 
</div>


<script type="text/javascript">
$('#pavdeals<?php echo $id;?>').carousel({interval:<?php echo ( $auto_play_mode?$interval:'false') ;?>,auto:<?php echo $auto_play;?>,pause:'hover'});
</script>