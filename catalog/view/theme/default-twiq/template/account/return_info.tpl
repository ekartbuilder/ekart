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
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" colspan="2">{{ text_return_detail }}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left" style="width: 50%;"><b>{{ text_return_id }}</b> #{{ return_id }}<br />
              <b>{{ text_date_added }}</b> {{ date_added }}</td>
            <td class="text-left" style="width: 50%;"><b>{{ text_order_id }}</b> #{{ order_id }}<br />
              <b>{{ text_date_ordered }}</b> {{ date_ordered }}</td>
          </tr>
        </tbody>
      </table>
      <h2>{{ text_product }}</h2>
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 33.3%;">{{ column_product }}</td>
            <td class="text-left" style="width: 33.3%;">{{ column_model }}</td>
            <td class="text-right" style="width: 33.3%;">{{ column_quantity }}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left">{{ product }}</td>
            <td class="text-left">{{ model }}</td>
            <td class="text-right">{{ quantity }}</td>
          </tr>
        </tbody>
      </table>
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 33.3%;">{{ column_reason }}</td>
            <td class="text-left" style="width: 33.3%;">{{ column_opened }}</td>
            <td class="text-left" style="width: 33.3%;">{{ column_action }}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left">{{ reason }}</td>
            <td class="text-left">{{ opened }}</td>
            <td class="text-left">{{ action }}</td>
          </tr>
        </tbody>
      </table>
      {% if comment %}
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left">{{ text_comment }}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left">{{ comment }}</td>
          </tr>
        </tbody>
      </table>
      {% endif %}
      {% if histories %}
      <h2>{{ text_history }}</h2>
      <table class="list table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 33.3%;">{{ column_date_added }}</td>
            <td class="text-left" style="width: 33.3%;">{{ column_status }}</td>
            <td class="text-left" style="width: 33.3%;">{{ column_comment }}</td>
          </tr>
        </thead>
        <tbody>
          {% for history in histories %}
          <tr>
            <td class="text-left">{{ history.date_added }}</td>
            <td class="text-left">{{ history.status }}</td>
            <td class="text-left">{{ history.comment }}</td>
          </tr>
          {% endfor %}
        </tbody>
      </table>
      {% endif %}
      <div class="buttons clearfix">
        <div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}