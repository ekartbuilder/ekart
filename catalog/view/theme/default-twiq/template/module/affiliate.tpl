<div class="list-group">  
  {% if not logged %}  
  <a href="{{ login }}" class="list-group-item">{{ text_login }}</a> <a href="{{ register }}" class="list-group-item">{{ text_register }}</a> <a href="{{ forgotten }}" class="list-group-item">{{ text_forgotten }}</a>
  {% endif %}
  <a href="{{ account }}" class="list-group-item">{{ text_account }}</a>
  {% if logged %}
  <a href="{{ edit }}" class="list-group-item">{{ text_edit }}</a> <a href="{{ password }}" class="list-group-item">{{ text_password }}</a>
  {% endif %}
  <a href="{{ payment }}" class="list-group-item">{{ text_payment }}</a> <a href="{{ tracking }}" class="list-group-item">{{ text_tracking }}</a> <a href="{{ transaction }}" class="list-group-item">{{ text_transaction }}</a>
  {% if logged %}
  <a href="{{ logout }}" class="list-group-item">{{ text_logout }}</a>
  {% endif %}
</div>
