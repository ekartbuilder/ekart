<?php 

$objlang = $this->registry->get('language');  
$ourl = $this->registry->get('url');

$config = $this->registry->get('config'); 
$themeConfig = (array)$config->get('themecontrol');

$twitterSetting = array('widget_twitter_account' => 'pavothemes', 'widget_twitter_id' => '366766896986591232');
$twitterSetting = array_merge($twitterSetting, $themeConfig );

$twitterID = $twitterSetting['widget_twitter_id'];
$twitterAccount = $twitterSetting['widget_twitter_account'];


?>
<div class="<?php echo str_replace('_','-',$blockid); ?> <?php echo $blockcls;?>" id="pavo-<?php echo str_replace('_','-',$blockid); ?>">
  <div class="container">
    <div class="row">

      <?php if( $content=$helper->getLangConfig('widget_contact_us') ) {?>
        <div class="column col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="box pav-custom">
              <div class="box-content">
              <?php echo $content; ?>
            </div>
          </div>
        </div>        
      <?php } ?>

              
      <div class="column col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <div class="box">
        <div class="box-heading">
          <span class="pull-left"><?php echo $text_extra; ?></span>
          <div class="bg-hedding pull-left"></div>
        </div>
        <div class="box-content">
          <ul class="list">
            <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
            <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
            <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
            <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
            <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
            <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
            <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
          </ul>
        </div>
        </div>
      </div>
        
      <div class="column col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <div class="box">
          <div class="box-heading">
            <span class="pull-left"><?php echo $text_account; ?></span>
            <div class="bg-hedding pull-left"></div>
          </div>
          <div class="box-content">
            <ul class="list">
              <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
              <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
              <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
              <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
              <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
              <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
              <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <?php $id = rand(); ?>
        <?php ?>
        <div class="box pavtwitter">
          <div class="box-heading">   
            <span class="pull-left"><?php echo $objlang->get( 'my twitter' ); ?></span>
            <div class="bg-hedding pull-left"></div>
          </div>
          <div class="box-content">
            <div id="pav-twitter<?php echo $id;?>" class="pav-twitter">
              <a class="twitter-timeline" data-dnt="true" data-theme="dark" data-link-color="#3ABEC0" data-chrome="noheader noborders nofooter transparent" lang="en" data-tweet-limit="1" data-show-replies="1" href="https://twitter.com/<?php echo $twitterAccount; ?>"  data-widget-id='<?php echo trim($twitterID); ?>'>Tweets by @<?php echo $twitterAccount; ?></a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
          </div>
        </div>
        <script type="text/javascript">
        // Customize twitter feed
        var hideTwitterAttempts = 0;
        function hideTwitterBoxElements() {
          setTimeout( function() {
            if ( $('[id*=pav-twitter<?php echo $id;?>]').length ) {
              $('#pav-twitter<?php echo $id;?> iframe').each( function(){
                var ibody = $(this).contents().find( 'body' );
                if ( ibody.find( '.timeline .stream .h-feed li.tweet' ).length ) {
                  ibody.find( '.header .p-nickname' ).css( 'color', 'white' );
                  ibody.find( '.p-name' ).css( 'color', 'white' );
                  ibody.find( '.e-entry-title' ).css( 'color', 'white' );
                } else {
                  $(this).hide();
                }
              });
            }
            hideTwitterAttempts++;
            if ( hideTwitterAttempts < 3 ) {
              hideTwitterBoxElements();
            }
          }, 1500);
        }
        hideTwitterBoxElements();
        </script>
      </div>


      <?php if( $content=$helper->getLangConfig('widget_follow_us') ) {?>
        <div class="column col-xs-12 col-sm-6 col-md-2 col-lg-2">
          <div class="box pav-custom  green">
            <div class="box-heading">
              <span class="pull-left"><?php echo $objlang->get('text_follow'); ?></span>
              <div class="bg-hedding pull-left"></div>
            </div>
              <div class="box-content">
              <?php echo $content; ?>
            </div>
          </div>
        </div>        
      <?php } ?>

      </div>
    </div>
  </div>
