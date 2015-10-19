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
      {% if products %}
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="{{ products|length + 1}}><strong>{{ text_product }}</strong></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ text_name }}</td>
            {% for product in products %}
            <td><a href="{{ products.product.product_id.href }}"><strong>{{ products.product.product_id.name }}</strong></a></td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_image }}</td>
            {% for product in products %}
            <td class="text-center">			
			{% if products.product.product_id.thumb %}
              <img src="{{ products.product.product_id.thumb }}" alt="{{ products.product.product_id.name}}" title="{{ products.product.product_id.name }}" class="img-thumbnail" />
              {% endif %}</td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_price }}</td>
            {% for product in products %}
            <td>
			{% if products.product.product_id.price %}
			{% if not products.product.product_id.special %}             
               {{products.product.product_id.price }} 
              {% else %}
              <strike> {{products.product.product_id.price}} </strike> {{ products.product.product_id.special }}
              {% endif %}
              {% endif %}</td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_model }}</td>
            {% for product in products %}
            <td>{{ products.product.product_id.model }}</td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_manufacturer }}</td>
            {% for product in products %}
            <td>{{ products.product.product_id.manufacturer }}</td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_availability }}</td>
            {% for product in products %}
            <td>{{ products.product.product_id.availability }}</td>
            {% endfor %}
          </tr>
          {% if review_status %}
          <tr>
            <td>{{ text_rating }}</td>
            {% for product in products %}
            <td class="rating">
			 {% for i in  1..5 %}	
		  {% if product.product.product_id.rating < i %}			
              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
              {% else %}
              <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
              {% endif %}
              {% endfor %}
              <br />
              {{ products.product.product_id.reviews }}</td>
            {% endfor %}
          </tr>
          {% endif %}
          <tr>
            <td>{{ text_summary }}</td>
            {% for product in products %}
            <td class="description">{{ products.product.product_id.description }}</td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_weight }}</td>
            {% for product in products %}
            <td>{{ products.product.product_id.weight }}</td>
            {% endfor %}
          </tr>
          <tr>
            <td>{{ text_dimension }}</td>
            {% for product in products %}
            <td>{{ products.product.product_id.length }} x {{ products.product.product_id.width }} x {{ products.product.product_id.height }}</td>
            {% endfor %}
          </tr>
        </tbody>
        {% for attribute_group in attribute_groups %}
        <thead>
          <tr>
            <td colspan="{{products|length +1}}"><strong>{{ attribute_group.name }}</strong></td>
          </tr>
        </thead>
     
		{% for  key in attribute in attribute_group.attribute %}
        <tbody>
          <tr>
            <td>{{ attribute.name }}</td>
            {% for product in products %}
         
			
			{% if  products.product.product_id.attribute.key is defined %}
            <td>{{ products.product.product_id.attribute.key }}</td>
            {% else %}
            <td></td>
            {% endif %}
            {% endfor %}
          </tr>
        </tbody>
        {% endfor %}
        {% endfor %}
        <tr>
          <td></td>
          {% for product in products %}
          <td><input type="button" value="{{ button_cart }}" class="btn btn-primary btn-block" onclick="cart.add('{{ product.product_id }}', '{{ product.minimum }}');" />
            <a href="{{ product.remove }}" class="btn btn-danger btn-block">{{ button_remove }}</a></td>
          {% endfor %}
        </tr>
      </table>
      {% else %}
      <p>{{ text_empty }}</p>
      <div class="buttons">
        <div class="pull-right"><a href="{{ continue }}" class="btn btn-default">{{ button_continue }}</a></div>
      </div>
      {% endif %}
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}