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
      <h1>{{ heading_title }}
        {% if weight %}
        &nbsp;({{ weight }})
        {% endif %}
      </h1>
      <form action="{{ action }}" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-center">{{ column_image }}</td>
                <td class="text-left">{{ column_name }}</td>
                <td class="text-left">{{ column_model }}</td>
                <td class="text-left">{{ column_quantity }}</td>
                <td class="text-right">{{ column_price }}</td>
                <td class="text-right">{{ column_total }}</td>
              </tr>
            </thead>
            <tbody>
              {% for product in products %}
              <tr>
                <td class="text-center">{% if product.thumb %}
                  <a href="{{ product['href'] }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-thumbnail" /></a>
                  {% endif %}</td>
                <td class="text-left"><a href="{{ product['href'] }}">{{ product.name }}</a>
                  <?php //if (!$product['stock']) { ?>
				  {% if not product.stock %}
                  <span class="text-danger">***</span>
                  {% endif %}
                  {% if product.option %}
				 
                  {% for option in product.option %}
                  <br />
                  <small>{{ option.name }}: {{ option.value }}</small>
                  {% endfor %}
                  {% endif %}
                 
				  {% if product.reward %}
                  <br />
                  <small>{{ product.reward }}</small>
                  {% endif %}
                  {% if product.recurring %}
                  <br />
                  <span class="label label-info">{{ text_recurring_item }}</span> <small>{{ product.recurring }}</small>
                  {% endif %}</td>
                <td class="text-left">{{ product.model }}</td>
                <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                    <input type="text" name="quantity[{{ product.key }}]" value="{{ product.quantity }}" size="1" class="form-control" />
                    <span class="input-group-btn">
                    <button type="submit" data-toggle="tooltip" title="{{ button_update }}" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                    <button type="button" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger" onclick="cart.remove('{{ product.key }}');"><i class="fa fa-times-circle"></i></button></span></div></td>
                <td class="text-right">{{ product.price }}</td>
                <td class="text-right">{{ product.total }}</td>
              </tr>
              {% endfor %}
              {% for vouchers in vouchers %}
              <tr>
                <td></td>
                <td class="text-left">{{ vouchers.description }}</td>
                <td class="text-left"></td>
                <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                    <input type="text" name="" value="1" size="1" disabled="disabled" class="form-control" />
                    <span class="input-group-btn"><button type="button" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger" onclick="voucher.remove('{{ vouchers.key }}');"><i class="fa fa-times-circle"></i></button></span></div></td>
                <td class="text-right">{{ vouchers.amount }}</td>
                <td class="text-right">{{ vouchers.amount }}</td>
              </tr>
              {% endfor %}
            </tbody>
          </table>
        </div>
      </form>
      <?php //if ($coupon || $voucher || $reward || $shipping) { ?>
	   {% if coupon or voucher or reward or shipping %}
      <h2>{{ text_next }}</h2>
      <p>{{ text_next_choice }}</p>
      <div class="panel-group" id="accordion">{{ coupon }}{{ voucher }}{{ reward }}{{ shipping }}</div>
      {% endif %}
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
        <div class="pull-left"><a href="{{ continue }}" class="btn btn-default">{{ button_shopping }}</a></div>
        <div class="pull-right"><a href="{{ checkout }}" class="btn btn-primary">{{ button_checkout }}</a></div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}