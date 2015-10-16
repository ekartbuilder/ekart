{{ header }}
<div class="container">
  <ul class="breadcrumb">
    {% for breadcrumb in breadcrumbs %}
    <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
{% if success %}
  <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ success }}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  <?php } ?>
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
      <div class="col-xs-12">
        <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="col-xs-8">
                <fieldset>
                     <div class="form-group required">
                        <label class="col-sm-3 control-label" for="emailField">{{ email_field }}</label>
                        <div class="col-sm-9">
                          <input type="text" name="email" value="" required="required" id="emailField" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-3 control-label" for="orderIDField">{{ order_field }}</label>
                        <div class="col-sm-9">
                          <input type="text" name="order_id" required="required" id="orderIDField" value="" class="form-control"/>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="clearfix"></div>
            <div class="buttons">
              <div class="pull-right">
                <input class="btn btn-primary" type="submit" value="{{ view_order }}" />
              </div>
            </div>
      	</form>     
      </div>
     {{ content_bottom }}</div>
     {{ column_right }}</div>
</div>
{{ footer }}