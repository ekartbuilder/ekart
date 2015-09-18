<nav id="topbar" class="topbar-v1">
  <div class="container"><div class="inside">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12">
        <ul class="login list-inline pull-left">
            <?php if ($logged) { ?>
            <li><a href="<?php echo $logout; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-unlock"></i><span class="hidden-xs"><?php echo $text_logout; ?></span></a>
          <?php } else { ?>
            <li><a href="<?php echo $register; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-key"></i><span class="hidden-xs"><?php echo $text_register; ?></span></a></li>
            <li><a href="<?php echo $login; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-lock"></i><span class="hidden-xs"><?php echo $text_login; ?></span></a></li>    
            <?php } ?>          
        </ul>
        <ul class="list-inline pull-left">
          <li><a href="<?php echo $account; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-user"></i><span class="hidden-xs"><?php echo $text_account; ?></span></a></li>
          <li><a id="wishlist-total" href="<?php echo $wishlist; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-list-alt"></i><span class="hidden-xs"><?php echo $text_wishlist; ?></span></a></li>
          <li><a href="<?php echo $shopping_cart; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-shopping-cart"></i><span class="hidden-xs"><?php echo $text_shopping_cart; ?></span></a></li>
        <li><a href="<?php echo $checkout; ?>"><i class="hidden-lg hidden-md fa-fw fa fa-share"></i><span class="hidden-xs"><?php echo $text_checkout; ?></span></a></li>
        </ul>
        <?php echo $currency; ?>
        <?php echo $language; ?>
      </div>
      <div class="col-md-4 hidden-sm hidden-xs">
        <?php
          if($content=$helper->getLangConfig('widget_about')){
          echo $content;
          }
          ?>
      </div>
    </div> <!-- end row -->
  </div></div>
</nav>