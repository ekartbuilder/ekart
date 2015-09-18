<div class="<?php echo str_replace('_','-',$blockid); ?> <?php echo $blockcls;?>" id="pavo-<?php echo str_replace('_','-',$blockid); ?>">
  <div class="container">
    <div class="inside space-padding-tb-30">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <?php
          if($content=$helper->getLangConfig('widget_logo')){
          echo $content;
          }
          ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <?php
          if($content=$helper->getLangConfig('widget_address')){
          echo $content;
          }
          ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <?php
          if($content=$helper->getLangConfig('widget_contact')){
          echo $content;
          }
          ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <?php
          if($content=$helper->getLangConfig('widget_social')){
          echo $content;
          }
          ?>
        </div>
      </div>
    </div>  
  </div>
</div>