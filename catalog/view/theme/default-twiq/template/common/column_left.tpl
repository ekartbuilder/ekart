{% if modules %}
<column id="column-left" class="col-sm-3 hidden-xs">
  {% for module in modules %}
  {{ module }}
  {% endfor %}
</column>
{% endif %}