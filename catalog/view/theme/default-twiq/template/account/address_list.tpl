{{ header }}
<div class="container">
  <ul class="breadcrumb">
    {% for breadcrumb in breadcrumbs %}
    <li><a href="{{ breadcrumb['href'] }}">{{ breadcrumb['text'] }}</a></li>
    {% endfor %}
  </ul>
  {% if success %}
  <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ success }}</div>
  {% endif %}
  {% if error_warning %}
  <div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>
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
      <h2>{{ text_address_book }}</h2>
      {% if addresses %}
      <table class="table table-bordered table-hover">
        {% for result in addresses %}
        <tr>
          <td class="text-left">{{ result.address }}</td>
          <td class="text-right"><a href="{{ result.update }}" class="btn btn-info">{{ button_edit }}</a> &nbsp; <a href="{{ result.delete }}" class="btn btn-danger">{{ button_delete }}</a></td>
        </tr>
        {% endfor %}
      </table>
      {% else %}
      <p>{{ text_empty }}</p>
      {% endif %}
      <div class="buttons clearfix">
        <div class="pull-left"><a href="{{ back }}" class="btn btn-default">{{ button_back }}</a></div>
        <div class="pull-right"><a href="{{ add }}" class="btn btn-primary">{{ button_new_address }}</a></div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}