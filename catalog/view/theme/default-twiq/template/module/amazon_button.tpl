<div class="panel panel-default">
  <div class="panel-body" style="text-align: {{ align }};"><span id="AmazonCheckoutWidgetModule{{ module }}"></span></div>
</div>
<script type="text/javascript"><!--
new CBA.Widgets.InlineCheckoutWidget({
	merchantId: '{{ merchant_id }}',
	buttonSettings: {
		color: '{{ button_colour }}',
		background: '{{ button_background }}',
		size: '{{ button_size }}',
	},
	onAuthorize: function(widget) {
		var redirect = '<?php echo html_entity_decode($amazon_checkout); ?>';

		if (redirect.indexOf('?') == -1) {
			window.location = redirect + '?contract_id=' + widget.getPurchaseContractId();
		} else {
			window.location = redirect + '&contract_id=' + widget.getPurchaseContractId();
		}
	}
}).render('AmazonCheckoutWidgetModule{{ module }}');
//--></script>