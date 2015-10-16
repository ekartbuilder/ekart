{{ header }}{{ column_left }}{{ column_right }}
<div class="container">{{ content_top }}
  <div style="text-align:center;">
    <h2>{{ text_success_title }}</h2>
    <p>{{ text_payment_success }}</p>
    <div style="margin: 0 auto; width: 392px;" id="AmazonOrderDetail"></div>
  </div>
  {{ content_bottom }}
</div>
<script type="text/javascript"><!--
  new CBA.Widgets.OrderDetailsWidget ({
    merchantId: "{{ merchant_id }}",
    orderID: "{{ amazon_order_id }}"
  }).render ("AmazonOrderDetail");
//--></script>
{{ footer }}