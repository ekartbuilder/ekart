<div class="<?php echo str_replace('_','-',$blockid); ?> <?php echo $blockcls;?>" id="pavo-<?php echo str_replace('_','-',$blockid); ?>">
  	<div class="container"><div class="inner">
  		<?php if( count($modules) <=0 ) { ?>  
        <div class="row">
          	<?php if ($informations) { ?>
          	<div class="col-md-2 col-sm-6 col-xs-12">
          		<div class="box">
	            	<div class="box-heading"><span><?php echo $text_information; ?></span></div>
	            	<ul class="list">
		              <?php foreach ($informations as $information) { ?>
		              <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
		              <?php } ?>
	            	</ul>
	          	</div>
          	</div>
          	<?php } ?>
          	<div class="col-md-2 col-sm-6 col-xs-12">
	            <div class="box">
		            <div class="box-heading"><span><?php echo $text_account; ?></span></div>
		            <ul class="list">
		              <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
		              <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
		              <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
		              <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
		            </ul>
		        </div>
          	</div>
          	<div class="col-md-2 col-sm-6 col-xs-12">
	          	<div class="box">
		            <div class="box-heading"><span><?php echo $text_extra; ?></span></div>
		            <ul class="list">
		              <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
		              <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
		              <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
		              <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
		            </ul>
	            </div>
          	</div>
          	<div class="col-md-3 col-sm-6 col-xs-12 column">
	            <?php
	              echo $helper->renderModule('pavnewsletter');
	            ?>
          	</div>
          	<div class="col-md-3 col-sm-6 col-xs-12">
	          	<?php
		            if($content=$helper->getLangConfig('widget_aboutus')){
		              echo $content;
		            }
		        ?>
	        </div>
	    </div>
	  	<?php } ?> 
	</div></div>
</div>

