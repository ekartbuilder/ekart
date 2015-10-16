{{ header }}{{ column_left }}{{ column_right }}
<div class="container">{{ content_top }}
  <div style="text-align:center;">
    <h3>{{ heading_payment }}</h3>
    <div style="margin: 0 auto; width: 400px;" id="amazon-wallet-widget"></div>
  </div>
  <div style="clear: both;"></div>
  <div class="buttons">
    <div class="pull-left">
      <a href="{{ back }}" class="btn btn-primary">{{ text_back }}</a>
    </div>
    <div class="pull-right">
      <input class="btn btn-primary" id="continue-button" type="submit" value="{{ text_continue }}" />
    </div>
  </div>
  <input type="hidden" name="payment_method" value="" />
  {{ content_bottom }}
</div>
<script type="text/javascript"><!--
  $(document).ready(function(){
    $('#continue-button').click(function(){
      $('div.warning').remove();

      if ($("input[name='payment_method']").val() == '1') {
        location = '<?php echo $continue ?>';
      } else {
        $('#amazon-wallet-widget').before('<div class="warning"><?php echo $error_payment_method ?></div>');
      }
    });

    new CBA.Widgets.WalletWidget({
      merchantId: '{{ merchant_id }}',
      displayMode: 'edit',
      onPaymentSelect: function(widget){
        $("input[name='payment_method']").val('1');
      }

    }).render('amazon-wallet-widget');
  });
//--></script>
{{ footer }}