<?php
  $this->language( 'module/themecontrol' );
  $objlang = $this->registry->get('language');
  $megamenu = $helper->renderModule('pavmegamenu');
  $autosearch = $helper->renderModule('pavautosearch');
  $verticalmenu = $helper->renderModule('pavverticalmenu');
  if( isset($_COOKIE[$themeName .'_skin']) && $_COOKIE[$themeName .'_skin'] ){
    $skin = trim($_COOKIE[$themeName .'_skin']);
  }
?>

<?php  require( ThemeControlHelper::getLayoutPath( 'common/addon/topbar-v2.tpl' ) );?>

<header id="header-layout" class="header-v4">
  <div class="container"><div class="inside">
    <div class="row">
      <div class="col-sm-12 text-center">
        <!-- logo -->
        <?php if( $logoType=='logo-theme'){ ?>
        <div id="logo-theme" class="logo space-padding-40">
          <a href="<?php echo $home; ?>">
            <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
          </a>
        </div>
        <?php } elseif ($logo) { ?>
        <div id="logo" class="logo space-padding-40">
          <a href="<?php echo $home; ?>">
            <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
          </a>
        </div>
        <?php } ?>
      </div>
    </div><!-- end row -->
  </div></div>
  <div class="container"><div class="inside border-top space-padding-lr-30">
    <div class="row">
      <div class="col-md-9 col-sm-6 col-xs-4">
        <!-- menu -->
        <div id="pav-mainnav" class="pav-mainnav"> <div class="pav-megamenu">
          <button data-toggle="offcanvas" class="btn btn-link canvas-menu hidden-lg hidden-md" type="button"><span class="fa fa-bars"></span> Menu</button>         
          <?php
          /**
          * Main Menu modules: as default if do not put megamenu, the theme will use categories menu for main menu
          */
          if (count($megamenu) && !empty($megamenu)) { echo $megamenu;?>
          <?php } elseif ($categories) { ?>
          <nav id="menu" class="navbar">
            <div class="navbar-header"><span id="category" class="visible-xs"><?php echo $text_category; ?></span>
              <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav">
                <?php foreach ($categories as $category) { ?>
                <?php if ($category['children']) { ?>
                <li class="dropdown"><a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?></a>
                <div class="dropdown-menu">
                  <div class="dropdown-inner">
                    <?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children) { ?>
                    <ul class="list-unstyled">
                      <?php foreach ($children as $child) { ?>
                      <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                      <?php } ?>
                    </ul>
                    <?php } ?>
                  </div>
                  <a href="<?php echo $category['href']; ?>" class="see-all"><?php echo $text_all; ?> <?php echo $category['name']; ?></a> </div>
                </li>
                <?php } else { ?>
                <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
                <?php } ?>
                <?php } ?>
              </ul>
            </div>
          </nav>
          <?php } ?>
        </div> </div>
        <!-- menu -->
      </div>
      <div class="col-md-3 col-sm-6 col-xs-8">
        <?php echo $search; ?>
      </div>
    </div><!-- end row -->
  </div></div><!-- end container -->
</header>