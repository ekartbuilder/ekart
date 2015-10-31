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
      <div class="row">
        <div class="col-sm-6">
          <ul>
            {% for category_1 in categories %}
            <li><a href="{{ category_1['href'] }}">{{ category_1['name'] }}</a>
              {% if category_1['children'] %}
              <ul>
                {% for category_2 in category_1['children'] %}
                <li><a href="{{ category_2['href'] }}">{{ category_2['name'] }}</a>
                  {% if category_2['children'] %}
                  <ul>
                    {% for category_3 in category_2['children'] %}
                    <li><a href="{{ category_3['href'] }}">{{ category_3['name'] }}</a></li>
                    {% endfor %}
                  </ul>
                  {% endif %}
                </li>
                {% endif %}
              </ul>
              {% endfor %}
            </li>
            {% endfor %}
          </ul>
        </div>
        <div class="col-sm-6">
          <ul>
            <li><a href="{{ special }}">{{ text_special }}</a></li>
            <li><a href="{{ account }}">{{ text_account }}</a>
              <ul>
                <li><a href="{{ edit }}">{{ text_edit }}</a></li>
                <li><a href="{{ password }}">{{ text_password }}</a></li>
                <li><a href="{{ address }}">{{ text_address }}</a></li>
                <li><a href="{{ history }}">{{ text_history }}</a></li>
                <li><a href="{{ download }}">{{ text_download }}</a></li>
              </ul>
            </li>
            <li><a href="{{ cart }}">{{ text_cart }}</a></li>
            <li><a href="{{ checkout }}">{{ text_checkout }}</a></li>
            <li><a href="{{ search }}">{{ text_search }}</a></li>
            <li>{{ text_information }}
              <ul>
                {% for information in informations %}
                <li><a href="{{ information['href'] }}">{{ information['title'] }}</a></li>
                {% endfor %}
                <li><a href="{{ contact }}">{{ text_contact }}</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
{{ footer }}