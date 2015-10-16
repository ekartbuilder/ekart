{{ header }}
<div class="container">
  <ul class="breadcrumb">
    {% for breadcrumb in breadcrumbs %}
    <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  {% if success %}
  <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ success }}</div>
  {% endif %}
  {% if error_warning %}
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>
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
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h2>{{ text_new_customer }}</h2>
            <p><strong>{{ text_register }}</strong></p>
            <p>{{ text_register_account }}</p>
            <a href="{{ register }}" class="btn btn-primary">{{ button_continue }}</a></div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h2>{{ text_returning_customer }}</h2>
            <p><strong>{{ text_i_am_returning_customer }}</strong></p>
            <form action="{{ action }}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label" for="input-email">{{ entry_email }}</label>
                <input type="text" name="email" value="{{ email }}" placeholder="{{ entry_email }}" id="input-email" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password">{{ entry_password }}</label>
                <input type="password" name="password" value="{{ password }}" placeholder="{{ entry_password }}" id="input-password" class="form-control" />
                <a href="{{ forgotten }}">{{ text_forgotten }}</a></div>
              <input type="submit" value="{{ button_login }}" class="btn btn-primary" />
              {% if redirect %}
              <input type="hidden" name="redirect" value="{{ redirect }}" />
              {% endif %}
            </form>
          </div>
        </div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}