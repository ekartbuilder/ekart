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
      <p>{{ text_total }} <b>{{ total }}</b>.</p>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">{{ column_date_added }}</td>
              <td class="text-left">{{ column_description }}</td>
              <td class="text-right">{{ column_points }}</td>
            </tr>
          </thead>
          <tbody>
            {% if rewards %}
            {% for reward in rewards  %}
            <tr>
              <td class="text-left">{{ reward.date_added }}</td>
              <td class="text-left">{% if reward.order_id %}
                <a href="{{ reward.href }}">{{ reward.description }}</a>
                {% else %}
                {{ reward.description }}
                {% endif %}</td>
              <td class="text-right">{{ reward['points'] }}</td>
            </tr>
            {% endfor %}
            {% else %}
            <tr>
              <td class="text-center" colspan="3">{{ text_empty }}</td>
            </tr>
            {% endif %}
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-sm-6 text-left">{{ pagination }}</div>
        <div class="col-sm-6 text-right">{{ results }}</div>
      </div>
      <div class="buttons clearfix">
        <div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}