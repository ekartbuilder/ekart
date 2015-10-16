<?php //if (count($currencies) > 1) { ?>

{% if currencies|length > 1 %}
<div class="pull-left">
<form action="{{ action }}" method="post" enctype="multipart/form-data" id="currency">
  <div class="btn-group">
    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
    {% for currency in currencies %}
    <?php //if ($currency['symbol_left'] && $currency['code'] == $code) { ?>
	{% if currency.symbol_left and currency.code==code %}
	
    <strong>{{ currency.symbol_left }}</strong>
    <?php //} elseif ($currency['symbol_right'] && $currency['code'] == $code) { ?>
	{% elseif currency.symbol_left and currency.code==code %}
	
    <strong>{{ currency.symbol_right }}</strong>
    {% endif %}
    {% endfor %}
    <span class="hidden-xs hidden-sm hidden-md">{{ text_currency }}</span> <i class="fa fa-caret-down"></i></button>
    <ul class="dropdown-menu">
      {% for currency in currencies %}
      {% if currency.symbol_left %}
      <li><button class="currency-select btn btn-link btn-block" type="button" name="{{ currency.code }}">{{ currency.symbol_left }} {{ currency.title }}</button></li>
      {% else %}
      <li><button class="currency-select btn btn-link btn-block" type="button" name="{{ currency.code }}">{{ currency.symbol_right }} {{ currency.title }}</button></li>
      {% endif %}
      {% endfor %}
    </ul>
  </div>
  <input type="hidden" name="code" value="" />
  <input type="hidden" name="redirect" value="{{ redirect }}" />
</form>
</div>
{% endif %}
