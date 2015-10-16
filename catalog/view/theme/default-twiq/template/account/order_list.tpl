{{ header }}
<div class="container">
  <ul class="breadcrumb">
    {% for breadcrumb in breadcrumbs %}
    <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
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
      {% if orders %}
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-right">{{ column_order_id }}</td>
              <td class="text-left">{{ column_status }}</td>
              <td class="text-left">{{ column_date_added }}</td>
              <td class="text-right">{{ column_product }}</td>
              <td class="text-left">{{ column_customer }}</td>
              <td class="text-right">{{ column_total }}</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            {% for order in orders %}
            <tr>
              <td class="text-right">#{{ order.order_id }}</td>
              <td class="text-left">{{ order.status }}</td>
              <td class="text-left">{{ order.date_added }}</td>
              <td class="text-right">{{ order.products }}</td>
              <td class="text-left">{{ order.name }}</td>
              <td class="text-right">{{ order.total }}</td>
              <td class="text-right"><a href="{{ order.href }}" data-toggle="tooltip" title="{{ button_view }}" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
            </tr>
            {% endfor %}
          </tbody>
        </table>
      </div>
      <div class="text-right">{{ pagination }}</div>
      {% else %}
      <p>{{ text_empty }}</p>
      {% endif %}
      <div class="buttons clearfix">
        <div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}