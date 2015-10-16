{{ header }}
<div class="container">
  <ul class="breadcrumb">
    {% for breadcrumb in breadcrumbs %}
    <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  {% if attention %}
  <div class="alert alert-info"><i class="fa fa-info-circle"></i> {{ attention }}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  {% endif %}
  {% if success %}
  <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ success }}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  {% endif %}
  {% if error_warning %}
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  {% endif %}
  <div class="row">{{ column_left }}
    {% if column_left and column_right %}
    {% set class = 'col-sm-6' %}
    {% elseif column_left or column_right %}
    {% set class = 'col-sm-9' %}
    {% else %}
    {% set class = 'col-sm-12' %}
    {% endif %}
    <div id="content" class="{{ class }}">{{ content_top }}
      <h1>{{ heading_title }}</h1>    
	  {% if coupon or voucher or reward %}
      <div class="panel-group" id="accordion">{{ coupon }}{{ voucher }}{{ reward }}</div>
      {% endif %}
      <?php if($has_shipping) { ?>
	 {% if has_shipping %}
      <?php //if(!isset($shipping_methods)) { ?>
	   {% if not shipping_methods %}
      <div class="warning">{{ error_no_shipping ?></div>
      {% else %}
      <form action="{{action_shipping }}" method="post" id="shipping_form">
        <div class="panel-body">
          {% for shipping_method in shipping_methods %}
          <p><strong>{{ shipping_method.title }}</strong></p>         
		  {% if not shipping_method.error %}
		  
          {% for quote in shipping_method.quote %}
          <div class="radio">
            <label>
              <?php //if ($quote['code'] == $code || !$code) { ?>
			  {% if not quote.code==code or not code %}
             		  
			  {{code=quote.code}}
			  
              <input type="radio" name="shipping_method" value="{{ quote.code }}" id="{{ quote.code }}" checked="checked" />
              {% else %}
              <input type="radio" name="shipping_method" value="{{ quote.code }}" id="{{ quote.code }}" />
              {% endif %}
              {{ quote['title'] }} </label>
          </div>
          {% endif %}
          {% else %}
          <div class="warning">{{ shipping_method.error }}</div>
          {% endif %}
          {% endif %}
        </div>
      </form>
      {% endif %}
      {% endif %}
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td class="text-left">{{ column_name }}</td>
              <td class="text-left">{{ column_model }}</td>
              <td class="text-center">{{ column_quantity }}</td>
              <td class="text-right">{{ column_price }}</td>
              <td class="text-right">{{ column_total }}</td>
            </tr>
          </thead>
          <tbody>
            {% for product in products %}
            <tr>
              <td class="text-left"><a href="{{ product.href }}">{{ product.name }}</a>
                {% for option in product.option %}
                <br />
                <small> - {{ option.name }}: {{ option.value }}</small>
                {% endfor %}
                {% if product.recurring %}
                <br />
                <span class="label label-info">{{ text_recurring_item }}</span> <small>{{ product.recurring_description }}</small>
                {% endif %}</td>
              <td class="text-left">{{ product.model }}</td>
              <td class="text-center">{{ product.quantity }}</td>
              <td class="text-right">{{ product.price }}</td>
              <td class="text-right">{{ product.total }}</td>
            </tr>
            {% endfor %}
            {% for voucher in vouchers %}
            <tr>
              <td class="text-left">{{ voucher.description }}</td>
              <td class="text-left"></td>
              <td class="text-center">1</td>
              <td class="text-right">{{ voucher.amount }}</td>
              <td class="text-right">{{ voucher.amount }}</td>
            </tr>
            {% endfor %}
          </tbody>
        </table>
      </div>
      <br />
      <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
            {% for total in totals %}
            <tr>
              <td class="text-right"><strong>{{ total.title }}:</strong></td>
              <td class="text-right">{{ total.text }}</td>
            </tr>
            {% endfor %}
          </table>
        </div>
      </div>
      <div class="buttons">
        <div class="pull-right"><a href="{{ action_confirm }}" class="btn btn-primary">{{ button_confirm }}</a></div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}
<script type="text/javascript"><!--
$('input[name=\'shipping_method\']').change(function() {
	$('#shipping_form').submit();
});

$('input[name=\'next\']').bind('change', function() {
	$('.cart-discounts > div').hide();

	$('#' + this.value).show();
});
//--></script>