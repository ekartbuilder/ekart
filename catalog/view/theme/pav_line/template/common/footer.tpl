<?php 
  /*
  * @package Framework for Opencart 2.0
  * @version 2.0
  * @author http://www.pavothemes.com
  * @copyright Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
  * @license   GNU General Public License version 2
  */
  require_once(DIR_SYSTEM . 'pavothemes/loader.php');
  $config = $this->registry->get('config'); 
  $helper = ThemeControlHelper::getInstance( $this->registry, $config->get('config_template') );
  $layoutID = 1 ;
  $helper->loadFooterModules();
  $objlang = $this->registry->get('language'); 
?>
 
<!-- 
  $ospans: allow overrides width of columns base on thiers indexs. format array( column-index=>span number ), example array( 1=> 3 )[value from 1->12]
 -->

<?php if( !($helper->getConfig('enable_pagebuilder') && $helper->isHomepage())  ){ ?>

<?php
  $blockid = 'mass_bottom';
  $blockcls = '';
  $modules = $helper->getModulesByPosition( $blockid ); 
  $ospans = array();
  require( ThemeControlHelper::getLayoutPath( 'common/block-cols.tpl' ) );
?>

<?php } ?>
 
<footer id="footer">
  
  <?php
    $blockid = 'footer_top';
    $blockcls = '';
    $ospans = array();
    require( ThemeControlHelper::getLayoutPath( 'common/block-footcols.tpl' ) );
    if(count($modules) <=0){
      require( ThemeControlHelper::getLayoutPath( 'common/footer/footer_top.tpl' ) );
    }
  ?>


  <?php

    $blockid = 'footer_center';
    $blockcls = '';
    $ospans = array();
    require( ThemeControlHelper::getLayoutPath( 'common/block-footcols.tpl' ) );
    if(count($modules) <=0){
      require( ThemeControlHelper::getLayoutPath( 'common/footer/footer_center.tpl' ) );
    }
  ?>

  <?php
    $blockid = 'footer_bottom';
    $blockcls = '';
    $ospans = array(1=>3,2=>9,3=>2,4=>2,5=>2,6=>3,7=>9);
    require( ThemeControlHelper::getLayoutPath( 'common/block-footcols.tpl' ) );
    if(count($modules) <=0){
      require( ThemeControlHelper::getLayoutPath( 'common/footer/footer_bottom.tpl' ) );
    }
  ?>
  <div id="powered">
    <div class="container">
      <div class="inner">
        <div class="copyright pull-left">
          <?php if( $helper->getConfig('enable_custom_copyright', 0) ) { ?>
            <?php echo $helper->getConfig('copyright'); ?>
          <?php } else { ?>
            <?php echo $powered; ?>. 
          <?php } ?>
    Designed by <a href="http://www.pavothemes.com/" title="Pavothemes - opencart themes clubs">Pavothemes</a>
        </div>  

        <?php if( $content=$helper->getLangConfig('widget_paypal') ) {?>
          <div class="paypal pull-right">
            <?php echo $content; ?>
          </div>
        <?php } ?>
        </div>
    </div>
  </div>

  <div id="top"><a class="scrollup" href="#"><i class="fa fa-angle-up"></i><?php echo $objlang->get("Top");?></a></div>
</footer>



<?php if( $helper->getConfig('enable_paneltool',0) ){  ?>
  <?php  echo $helper->renderAddon( 'panel' );?>
<?php } ?>

</div>
<?php
  $offcanvas = $helper->getConfig('offcanvas','category');
  if($offcanvas == "megamenu") {
      echo $helper->renderAddon( 'offcanvas');
  } else {
      echo $helper->renderAddon( 'offcanvas-category');
  }

  ?> 
</div> 
</body></html>