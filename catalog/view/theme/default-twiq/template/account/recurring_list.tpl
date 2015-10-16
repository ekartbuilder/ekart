{{ header }}
<div class="container">
  <ul class="breadcrumb">
    {% for breadcrumb in breadcrumbs %}
    <li><a href="{{ breadcrumb['href'] }}">{{ breadcrumb['text'] }}</a></li>
    {% endif %}
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
      {% if recurrings %}
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">{{ column_recurring_id }}</td>
              <td class="text-left">{{ column_date_added }}</td>
              <td class="text-left">{{ column_status }}</td>
              <td class="text-left">{{ column_product }}</td>
              <td class="text-right">{{ column_action }}</td>
            </tr>
          </thead>
          <tbody>
            {% for recurring in recurrings %}
              <tr>
                <td class="text-left">#{{ recurring['id'] }}</td>
                <td class="text-left">{{ recurring['date_added'] }}</td>
                <td class="text-left">{{ status_types[$recurring['status']] }}</td>
                <td class="text-left">{{ recurring['name'] }}</td>
                <td class="text-right"><a href="{{ recurring['href'] }}" class="btn btn-info">{{ button_view }}</a></td>
              </tr>
            {% endif %}
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