<?php
$objlang = $this->registry->get('language');
?>
<div id="header">
  <div class="container">
  	<div class="header-wrap">
		<?php if( $logoType=='logo-theme'){ ?>
		<div  id="logo-theme" class="logo-store col-lg-2 col-md-2 col-sm-12 col-xs-12 pull-left">
			<a href="<?php echo $home; ?>">
				<span><?php echo $name; ?></span>
			</a>
		</div>
		<?php } elseif ($logo) { ?>
			<div id="logo" class="logo-store col-lg-2 col-md-2 col-sm-12 col-xs-12 pull-left">
				<a href="<?php echo $home; ?>">
					<img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
				</a>
			</div>
		<?php } ?>
		<div id="topbar" class="pull-right col-lg-10 col-md-10 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-6 col-md-5 col-sm-4 center-sm hidden-sm hidden-xs">
	                <ul class="links menu-mini">
	                    <li><a><?php echo $objlang->get('text_my_menu'); ?></a>
	                    <ul class="dropdown-menu">
	                        <li><a href="<?php echo $wishlist; ?>" id="wishlist-total"><i class="fa fa-heart"></i><?php echo $text_wishlist; ?></a></li>
	                        <li><a class="account" href="<?php echo $account; ?>"><i class="fa fa-user"></i><?php echo $text_account; ?></a></li>
	                        <li><a class="shoppingcart" href="<?php echo $shopping_cart; ?>"><i class="fa fa-shopping-cart"></i><?php echo $text_shopping_cart; ?></a></li>
	                        <li><a class="last checkout" href="<?php echo $checkout; ?>"><i class="fa fa-file"></i><?php echo $text_checkout; ?></a></li>
	                    </ul></li>
	                </ul>
	                <ul class="links">
	                <?php if ($logged) { ?>
				    	<li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
				    <?php } else { ?>
					    <li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
					    <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>  
				    <?php } ?>
					</ul>
	            </div>
	            <div class="col-lg-2 col-md-3 col-sm-4 center-sm hidden-sm hidden-xs">
	                <div class="currency pull-right">
	                    <?php echo $currency; ?>
	                </div>
	                <div class="language pull-right">
	                    <?php echo $language; ?>
	                </div>
	            </div>
	            <div class="show-mobile hidden-lg hidden-md pull-right col-sm-12 col-xs-12">
	            	<div class="quick-menu pull-left">
	            		<button data-toggle="offcanvas" class="btn btn-theme-normal dropdown-toggle" type="button"><span class="fa fa-bars"></span></button>
	            	</div>
	                <div class="quick-user pull-right">
	                    <div class="quickaccess-toggle">
	                        <i class="fa fa-user"></i>
	                    </div>
	                    <div class="inner-toggle">
	                        <div class="login links">
	                        	<ul class="links">
									<?php if ($logged) { ?>
								    	<li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
								    <?php } else { ?>
									    <li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
									    <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>  
								    <?php } ?>
								</ul>
	                        </div>
	                    </div>
	                </div>
	                <div class="quick-access pull-right">
	                    <div class="quickaccess-toggle">
	                        <i class="fa fa-list"></i>
	                    </div>
	                    <div class="inner-toggle">
	                        <ul class="links pull-left">
	                            <li><a class="wishlist" href="<?php echo $wishlist; ?>" id="mobile-wishlist-total"><span class="fa fa-heart"></span><?php echo $text_wishlist; ?></a></li>
	                            <li><a class="account" href="<?php echo $account; ?>"><span class="fa fa-user"></span><?php echo $text_account; ?></a></li>
	                            <li><a class="shoppingcart" href="<?php echo $shopping_cart; ?>"><span class="fa fa-shopping-cart"></span><?php echo $text_shopping_cart; ?></a></li>
	                            <li><a class="last checkout" href="<?php echo $checkout; ?>"><span class="fa fa-file"></span><?php echo $text_checkout; ?></a></li>

	                        </ul>
	                    </div>
	                </div>


	                <div id="search_mobile_topbar" class="pull-right">
	                    <div class="quickaccess-toggle">
	                        <i class="fa fa-search"></i>
	                    </div>
	                    <div class="inner-toggle">
	                        <div id="search-m">
							<?php echo str_replace('name="search"','name="search-m"',$search); ?>
						</div>
	                    </div>
	                </div>


	                <div class="support pull-right">
	                    <div class="quickaccess-toggle">
	                        <i class="fa fa-sun-o"></i>
	                    </div>
	                    <div class="inner-toggle">
	                        <div class="currency pull-left">
	                            <?php echo $currency; ?>
	                        </div>
	                        <div class="language pull-left">
	                            <?php echo $language; ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="cart-top col-lg-4 col-md-4 hidden-sm hidden-xs center-sm">
	                <?php echo $cart; ?>
	            </div>
			</div>
	  	</div>
	  	<div id="header-main" class="pull-right col-lg-10 col-md-10 col-sm-12 col-xs-12">
	  		<div class="row">
	  			<div id="pav-mainnav" class="col-lg-8 col-md-8 col-sm-8 col-xs-2">
					<?php
					/**
					 * Main Menu modules: as default if do not put megamenu, the theme will use categories menu for main menu
					 */
					$modules = $helper->renderModule('pavmegamenu');

					if (count($modules) && !empty($modules)) { ?>

					    
					<?php echo $modules; ?>
					 

					<?php } elseif ($categories) { ?>

					    <div class="navbar navbar-inverse"> 
					        <nav id="mainmenutop" class="pav-megamenu" role="navigation"> 
					            <div class="navbar-header">
					                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					                    <span class="sr-only">Toggle navigation</span>
					                    <span class="fa fa-bars"></span>
					                </button>
					            </div>

					            <div class="collapse navbar-collapse navbar-ex1-collapse">
					                <ul class="nav navbar-nav">
					                    
					                    <?php foreach ($categories as $category) { ?>

					                        <?php if ($category['children']) { ?>			
					                            <li class="parent dropdown deeper ">
					                                <a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?>
					                                    <b class="fa fa-angle-down"></b>
					                                    <span class="triangles"></span>
					                                </a>
					                            <?php } else { ?>
					                            <li>
					                                <a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
					                            <?php } ?>
					                            <?php if ($category['children']) { ?>
					                                <ul class="dropdown-menu">
					                                    <?php for ($i = 0; $i < count($category['children']);) { ?>
					                                        <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
					                                        <?php for (; $i < $j; $i++) { ?>
					                                            <?php if (isset($category['children'][$i])) { ?>
					                                                <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
					                                            <?php } ?>
					                                        <?php } ?>
					                                    <?php } ?>
					                                </ul>
					                            <?php } ?>
					                        </li>
					                    <?php } ?>
					                </ul>
					            </div>	
					        </nav>
					    </div>   
					<?php } ?>
				</div>
			    <div class="header-right col-lg-4 col-md-4 hidden-sm hidden-xs">
					<div class="search_header pull-left">
						<div id="search">
							<?php echo $search; ?>
				  		</div>
				  	</div>
			    </div>
	  		</div>
	  	</div>
  	</div>  	
  </div>
</div>





