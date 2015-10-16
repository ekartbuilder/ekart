{% if languages|length > 1 %}
<div class="pull-left">
<form action="{{ action }}" method="post" enctype="multipart/form-data" id="language">
  <div class="btn-group">
    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
    {% for language in languages %}
    {% if language.code == code %}
    <img src="image/flags/{{ language.image }}" alt="{{ language.name }}" title="{{ language.name }}">
    {% endif %}
    {% endfor %}
    <span class="hidden-xs hidden-sm hidden-md">{{ text_language }}</span> <i class="fa fa-caret-down"></i></button>
    <ul class="dropdown-menu">
      {% for language in languages %}
      <li><a href="{{ language.code }}"><img src="image/flags/{{ language.image }}" alt="{{ language.name }}" title="{{ language.name }}" /> {{ language.name }}</a></li>
      {% endfor %}
    </ul>
  </div>
  <input type="hidden" name="code" value="" />
  <input type="hidden" name="redirect" value="{{ redirect }}" />
</form>
</div>
{% endif %}
