<?php 
    
    $mode = 'default';
    $cols = array( 'default' => array(6,5),
                   'horizontal' => array(4,6)
    ); 
    $cols = $cols[$mode];     
?>
<?php $olang = $this->registry->get('language'); ?>
<div class="product-info">
<div class="container">
    <div class="row">
    <?php require( ThemeControlHelper::getLayoutPath( 'common/detail/'.$mode.'.tpl' ) );  ?> 
   
	<div class="col-xs-12 col-sm-<?php echo $cols[1]; ?> col-md-<?php echo $cols[1]; ?> col-lg-<?php echo $cols[1]; ?> column-detail pull-left">
        <div class="wrapper-product-detail">
		<h1><?php echo $heading_title; ?></h1>
        <?php if ($review_status) { ?>
            <div class="rating">
                <p>
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <?php if ($rating < $i) { ?>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <?php } else { ?>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <?php } ?>
                    <?php } ?>
                    <a href="#review-form" class="popup-with-form" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;" ><?php echo $reviews; ?></a> / <a href="#review-form"  class="popup-with-form" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;" ><?php echo $text_write; ?></a></p>
            </div>
        <?php } ?>    

        <div id="product" class="product-extra">
            <div class="price-cart">
                <?php if ($price) { ?>
                    <div class="price">
                        <ul class="list-unstyled">
                            <?php if (!$special) { ?>
                                <li class="price-gruop">
                                    <span class="text-price"> <?php echo $price; ?> </span>
                                </li>
                            <?php } else { ?>

                                <li> <span class="price-new"> <?php echo $special; ?> </span> <span class="price-old"><?php echo $price; ?></span> </li>
                            <?php } ?>
                            <?php if ($tax) { ?>
                                <li class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></li>
                            <?php } ?>

                            <?php if ($discounts) { ?>
                                <li>
                                </li>
                                <?php foreach ($discounts as $discount) { ?>
                                    <li><?php echo $discount['quantity']; ?><?php echo $text_discount; ?><?php echo $discount['price']; ?></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="product-extra">
                    <div class="quantity-adder pull-left">
                        <span class="add-down add-action"><span class="fa fa-minus"></span></span>
                        <input type="text" name="quantity" value="<?php echo $minimum; ?>" size="2" id="input-quantity" />
                        <span class="add-up add-action"><span class="fa fa-plus"></span></span>          
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                    <button type="button" id="button-cart" data-loading-text="<?php echo $text_loading; ?>" class="button"><?php echo $button_cart; ?></button>
                </div>
                <?php if ($minimum > 1) { ?>
                    <div class="minimum"><?php echo $text_minimum; ?></div>
                <?php } ?>
            </div>        
            <?php if ($options) { ?>
                <h3><?php echo $text_option; ?></h3>
                <?php foreach ($options as $option) { ?>
                    <?php if ($option['type'] == 'select') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                            <select name="option[<?php echo $option['product_option_id']; ?>]" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control">
                                <option value=""><?php echo $text_select; ?></option>
                                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                                    <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                                        <?php if ($option_value['price']) { ?>
                                            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                                        <?php } ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'radio') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label"><?php echo $option['name']; ?></label>
                            <div id="input-option<?php echo $option['product_option_id']; ?>">
                                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" />
                                            <?php echo $option_value['name']; ?>
                                            <?php if ($option_value['price']) { ?>
                                                (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                                            <?php } ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'checkbox') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label"><?php echo $option['name']; ?></label>
                            <div id="input-option<?php echo $option['product_option_id']; ?>">
                                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" />
                                            <?php echo $option_value['name']; ?>
                                            <?php if ($option_value['price']) { ?>
                                                (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                                            <?php } ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'image') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label"><?php echo $option['name']; ?></label>
                            <div id="input-option<?php echo $option['product_option_id']; ?>">
                                <?php foreach ($option['product_option_value'] as $option_value) { ?>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" />
                                            <img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" class="img-thumbnail" /> <?php echo $option_value['name']; ?>
                                            <?php if ($option_value['price']) { ?>
                                                (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                                            <?php } ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'text') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                            <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" placeholder="<?php echo $option['name']; ?>" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'textarea') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                            <textarea name="option[<?php echo $option['product_option_id']; ?>]" rows="5" placeholder="<?php echo $option['name']; ?>" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control"><?php echo $option['value']; ?></textarea>
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'file') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label"><?php echo $option['name']; ?></label>
                            <button type="button" id="button-upload<?php echo $option['product_option_id']; ?>" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-default"><i class="fa fa-upload"></i> <?php echo $button_upload; ?></button>
                            <input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" id="input-option<?php echo $option['product_option_id']; ?>" />
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'date') { ?>
                    <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                      <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                      <div class="input-group date">
                        <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" data-format="YYYY-MM-DD" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                        </span></div>
                    </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'datetime') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                            <div class="input-group datetime">
                                <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" data-format="YYYY-MM-DD HH:mm" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                </span></div>
                        </div>
                    <?php } ?>
                    <?php if ($option['type'] == 'time') { ?>
                        <div class="form-group<?php echo ($option['required'] ? ' required' : ''); ?>">
                            <label class="control-label" for="input-option<?php echo $option['product_option_id']; ?>"><?php echo $option['name']; ?></label>
                            <div class="input-group time">
                                <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['value']; ?>" data-format="HH:mm" id="input-option<?php echo $option['product_option_id']; ?>" class="form-control" />
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                </span></div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <?php if ($recurrings) { ?>
                <hr>
                <h3><?php echo $text_payment_recurring ?></h3>
                <div class="form-group required">
                    <select name="recurring_id" class="form-control">
                        <option value=""><?php echo $text_select; ?></option>
                        <?php foreach ($recurrings as $recurring) { ?>
                            <option value="<?php echo $recurring['recurring_id'] ?>"><?php echo $recurring['name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block" id="recurring-description"></div>
                </div>
            <?php } ?>
         </div>
 
        <?php if ($tags) { ?>
          <p><?php echo $text_tags; ?>
            <?php for ($i = 0; $i < count($tags); $i++) { ?>
            <?php if ($i < (count($tags) - 1)) { ?>
            <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>,
            <?php } else { ?>
            <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
            <?php } ?>
            <?php } ?>
          </p>
        <?php } ?>
        </div>
	</div>

    <div class="column-info col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left">
        <div class="block wish-list"><i class="fa fa-heart pull-left"></i>
            <a onclick="wishlist.addwishlist('<?php echo $product_id; ?>');"><?php echo $button_wishlist; ?></a>
        </div>
        <div class="block compare"><i class="fa fa-exchange pull-left"></i>
            <a onclick="compare.addcompare('<?php echo $product_id; ?>');"><?php echo $button_compare; ?></a>
        </div>
        <div class="block share clearfix">
             <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script> 
            <!-- AddThis Button END -->
        </div>
        <ul class="list-unstyled block description">
            <?php if ($manufacturer) { ?>
                <li><span><?php echo $text_manufacturer; ?></span> <a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a></li>
            <?php } ?>
            <li><span><?php echo $text_model; ?></span> <?php echo $model; ?></li>
            <?php if ($reward) { ?>
                <li><span><?php echo $text_reward; ?></span> <?php echo $reward; ?></li>
            <?php } ?>
            <?php if ($points) { ?>
                <li><span><?php echo $text_points; ?></span> <?php echo $points; ?></li>
            <?php } ?>
            <li><span class="availability"><?php echo $text_stock; ?></span> <?php echo $stock; ?></li>
        </ul>
    </div>
</div>
    </div>
</div>
<div class="tabs-group">
    <ul class="nav clearfix">
        <li class="active"><a href="#tab-description" data-toggle="tab"><?php echo $tab_description; ?><span class="triangle-bottomright"></span></a></li>
        <?php if ($attribute_groups) { ?>
            <li><a href="#tab-specification" data-toggle="tab"><?php echo $tab_attribute; ?><span class="triangle-bottomright"></span></a></li>
        <?php } ?>
        <?php if ($review_status) { ?>
            <li><a href="#tab-review" data-toggle="tab"><?php echo $tab_review; ?><span class="triangle-bottomright"></span></a></li>
        <?php } ?>
        <?php if( $productConfig['enable_product_customtab'] && isset($productConfig['product_customtab_name'][$languageID]) ) { ?>
            <li><a href="#tab-customtab" data-toggle="tab"><?php echo $productConfig['product_customtab_name'][$languageID]; ?><span class="triangle-bottomright"></span></a></li>
        <?php } ?>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-description"><?php echo $description; ?></div>
        <?php if ($attribute_groups) { ?>
            <div class="tab-pane" id="tab-specification">
                <table class="table table-bordered">
                    <?php foreach ($attribute_groups as $attribute_group) { ?>
                        <thead>
                            <tr>
                                <td colspan="2"><strong><?php echo $attribute_group['name']; ?></strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
                                <tr>
                                    <td><?php echo $attribute['name']; ?></td>
                                    <td><?php echo $attribute['text']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
        <?php if ($review_status) { ?>

            <div class="tab-pane" id="tab-review">

                <div id="review"></div>
                <p> <a href="#review-form"  class="popup-with-form btn btn-sm button" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;" ><?php echo $text_write; ?></a></p>

               <div class="hide"> <div id="review-form" class="panel review-form-width"><div class="panel-body">
                <form class="form-horizontal ">
                 
                    <h2><?php echo $text_write; ?></h2>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
                            <input type="text" name="name" value="" id="input-name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-review"><?php echo $entry_review; ?></label>
                            <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                            <div class="help-block"><?php echo $text_note; ?></div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label"><?php echo $entry_rating; ?></label>
                            &nbsp;&nbsp;&nbsp; <?php echo $entry_bad; ?>&nbsp;
                            <input type="radio" name="rating" value="1" />
                            &nbsp;
                            <input type="radio" name="rating" value="2" />
                            &nbsp;
                            <input type="radio" name="rating" value="3" />
                            &nbsp;
                            <input type="radio" name="rating" value="4" />
                            &nbsp;
                            <input type="radio" name="rating" value="5" />
                            &nbsp;<?php echo $entry_good; ?></div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-captcha"><?php echo $entry_captcha; ?></label>
                            <input type="text" name="captcha" value="" id="input-captcha" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12"> <img src="index.php?route=tool/captcha" alt="" id="captcha" /> </div>
                    </div>
                    <div class="buttons">
                        <div class="pull-right">
                            <button type="button" id="button-review" data-loading-text="<?php echo $text_loading; ?>" class="button btn"><?php echo $button_continue; ?></button>
                        </div>
                    </div>
                </form></div></div></div>

            </div>
        <?php } ?>

        <?php if( $productConfig['enable_product_customtab'] && isset($productConfig['product_customtab_content'][$languageID]) ) { ?>
            <div id="tab-customtab" class="tab-content tab-pane custom-tab">
                <div class="inner">
                    <?php echo html_entity_decode( $productConfig['product_customtab_content'][$languageID], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </div>
        <?php } ?>

    </div>
</div>


