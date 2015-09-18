<?php
	//call by framework Auto Search
	// $configsearch = $this->config->get('pavautosearch_module');
	// $autosearch = empty($configsearch)?'':$helper->renderModule( 'module/pavautosearch' );
	//$autosearch = null;

	// $verticalmenu = $this->config->get('pavverticalmenu_module');
	// $verticalmenu = empty($configsearch)?'':$helper->renderModule( 'module/pavverticalmenu' );
	$this->language( 'module/themecontrol' );
	$objlang = $this->registry->get('language');
 	
	$autosearch = $helper->renderModule( 'pavautosearch' );
	$megamenu = $helper->renderModule('pavmegamenu');

?>
<div class="background-top" style="background-position: 50% -16px;"></div>
<nav id="topbar">
  <div class="container">
	<div class="quick-access pull-left">
		<div class="login links">
			<?php if ($logged) { ?>
				<a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a>
			<?php } else { ?>
				<a href="<?php echo $register; ?>"><?php echo $text_register; ?></a> or
				<a href="<?php echo $login; ?>"><?php echo $text_login; ?></a>		
			<?php } ?>					
		</div>
		<div class="btn-group">
			<div data-toggle="dropdown" class="dropdown-toggle btn-theme-normal">
                <i class="fa fa-cog"></i>	                                     
                <span class="fa fa-angle-down"></span>
            </div>
            <div class="quick-localisation dropdown-menu tree-menu">
            	<?php echo $language; ?>
            	<?php echo $currency; ?>				
			</div>
		</div>					
		<div class="btn-group">
			<div data-toggle="dropdown" class="dropdown-toggle btn-theme-normal">
                <i class="fa fa-user"></i>	                                     
                <span class="fa fa-angle-down"></span>
            </div>
            <div class="quick-setting dropdown-menu tree-menu">
            	<ul class="links">
					<li><a id="wishlist-total" href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
					<li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
					<li><a href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a></li>
					<li><a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
				</ul>				
			</div>
		</div>
	</div>
	<div class="quick-action pull-right">			
		<?php echo $cart; ?>
		<div class="btn-group search-focus">
			<div data-toggle="dropdown" class="dropdown-toggle btn-theme-normal">
                <i class="fa fa-search"></i>	                                     
                <span class="fa fa-angle-down"></span>
            </div>
            <div class="quick-search dropdown-menu tree-menu">
            	<?php echo $search; ?>
            </div>
		</div> 
	</div>
  </div>
</nav><!-- end topbar -->
<header id="header-main">	
	<div class="container"> 
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logo inner">					
				<?php if( $logoType=='logo-theme'){ ?>
				<div id="logo-theme" class="logo-store">
					<a href="<?php echo $home; ?>">
						<img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive"/>
					</a>
				</div>
				<?php } elseif ($logo) { ?>
				<div id="logo" class="logo-store">
					<a href="<?php echo $home; ?>">
						<img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive"/>
					</a>
				</div>
				<?php } ?> 
			</div>			
		</div>
	</div>
</header>
<!-- menu -->  		  
<div id="pav-mainnav" class="main-menu">
	<div class="container">
		<div class="pav-megamenu">			
			<button data-toggle="offcanvas" class="btn btn-danger canvas-menu hidden-lg hidden-md hidden-sm" type="button"><span class="fa fa-bars"></span> Menu</button>
			<?php
			/**
			 * Main Menu modules: as default if do not put megamenu, the theme will use categories menu for main menu
			 */
			$modules = $helper->renderModule('pavmegamenu');

			if (count($modules) && !empty($modules)) { ?>

			    
			<?php echo $modules; ?>
			 

			<?php } elseif ($categories) { ?>

		    <div class="navbar navbar-outline"> 
		        <nav id="mainmenutop" class="megamenu" role="navigation"> 
		            <div class="navbar-header">
			            <div class="collapse navbar-collapse navbar-ex1-collapse hidden-xs">
			                <ul class="nav navbar-nav megamenu">
			                    <li><a href="<?php echo $home; ?>" title="<?php echo $objlang->get('text_home'); ?>"><?php echo $objlang->get('text_home'); ?></a></li>
				                    <?php foreach ($categories as $category) { ?>
				                        <?php if ($category['children']) { ?>			
				                            <li class="parent dropdown deeper ">
				                                <a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?>
				                                    <span class="caret"></span>
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
		            </div>
		        </nav>
		    </div>   
		<?php } ?>
		</div>
	</div>
</div>

