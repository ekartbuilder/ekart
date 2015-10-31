{{ header }}{{ column_left }}{{ column_right }}
<div class="container">{{ content_top }}
	<form class="payment-form" method="POST" action="{{ process_order }}">
		<div style="text-align:center;">
			<h3>{{ heading_confirm }}</h3>
			<?php //if(isset($amazon_login_pay_test)){ ?>
			{% if amazon_login_pay_test %}
			<label>Debug Error Code     :</label>
			<div id="errorCode_address"></div>
			<br>
			<label>Debug Error Message  :</label>
			<div id="errorMessage_address"></div>
			{% endif %}
			<div style="display: inline-block; width: 400px; height: 185px;" id="readOnlyAddressBookWidgetDiv"></div>
			<br>
			<?php if($amazon_login_pay_test){ ?>
			<label>Debug Error Code     :</label>
			<div id="errorCode_wallet"></div>
			<br>
			<label>Debug Error Message  :</label>
			<div id="errorMessage_wallet"></div>
			{% endif %}
			<div style="display: inline-block; width: 400px; height: 185px;" id="readOnlyWalletWidgetDiv"></div>
		</div>
		<div style="clear: both;"></div>
	</form>
	<div class="checkout-product" style="margin-top: 15px">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td class="text-left">{{ column_name }}</td>
					<td class="text-left">{{ column_model }}</td>
					<td class="text-right">{{ column_quantity }}</td>
					<td class="text-right">{{ column_price }}</td>
					<td class="text-right">{{ column_total }}</td>
				</tr>
			</thead>
			<tbody>
				{% for product in products %}
					<tr>
						<td class="text-left">{{ product['name'] }}
							{% for option in product['option'] %}
								<br />
								&nbsp;<small> - {{ option['name'] }}: {{ option['value'] }}</small>
							{% endif %}</td>
						<td class="text-left">{{ product['model'] }}</td>
						<td class="text-right">{{ product['quantity'] }}</td>
						<td class="text-right">{{ product['price'] }}</td>
						<td class="text-right">{{ product['total'] }}</td>
					</tr>
				{% endif %}
			</tbody>
			<tfoot>
				{% for total in totals %}
					<tr>
						<td colspan="4" class="text-right"><strong>{{ total['title'] }}:</strong></td>
						<td class="text-right">{{ total['text'] }}</td>
					</tr>
				{% endif %}
			</tfoot>
		</table>
	</div>
	<div class="buttons">
		<div class="pull-left">
			<a href="{{ back }}" class="btn btn-primary">{{ text_back }}</a>
		</div>
		<div class="pull-right">
			<input class="btn btn-primary" id="confirm-button" type="submit" value="{{ text_confirm }}" />
		</div>
	</div>
	{{ content_bottom }}
</div>
<script>
	$(document).ready(function() {
		amazon.Login.setClientId('<?php echo $amazon_login_pay_client_id ?>');
		new OffAmazonPayments.Widgets.AddressBook({
			sellerId: '{{ amazon_login_pay_merchant_id }}',
			amazonOrderReferenceId: '{{ AmazonOrderReferenceId }}',
			displayMode: "Read",
			design: {
				designMode: 'responsive'
			},
			onError: function(error) {
				document.getElementById("errorCode_address").innerHTML = error.getErrorCode();
				document.getElementById("errorMessage_address").innerHTML = error.getErrorMessage();
			}
		}).bind("readOnlyAddressBookWidgetDiv");


		new OffAmazonPayments.Widgets.Wallet({
			sellerId: '{{ amazon_login_pay_merchant_id }}',
			amazonOrderReferenceId: '{{ AmazonOrderReferenceId }}',
			displayMode: "Read",
			design: {
				designMode: 'responsive'
			},
			onError: function(error) {
				document.getElementById("errorCode_wallet").innerHTML = error.getErrorCode();
				document.getElementById("errorMessage_wallet").innerHTML = error.getErrorMessage();
			}
		}).bind("readOnlyWalletWidgetDiv");



		$('#confirm-button').click(function() {
			if ($(this).attr('disabled') != 'disabled') {
				$('.payment-form').submit();
			}

			$(this).attr('disabled', 'disabled');
		});
	});
//--></script>
{{ footer }}