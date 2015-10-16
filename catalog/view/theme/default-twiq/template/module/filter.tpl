<div class="panel panel-default">
  <div class="panel-heading">{{ heading_title }}</div>
  <div class="list-group">
    {% for filter_group in filter_groups %}
    <a class="list-group-item">{{ filter_group.name }}</a>
    <div class="list-group-item">
      <div id="filter-group{{ filter_group.filter_group_id }}">
        {% for filter in filter_group.filter %}
        <div class="checkbox">
          <label>
			{% if filter.filter_id in filter_category %}
			
            <input type="checkbox" name="filter[]" value="{{ filter.filter_id }}" checked="checked" />
            {{ filter.name }}
            {% else %}
            <input type="checkbox" name="filter[]" value="{{ filter.filter_id }}" />
            {{ filter.name }}
            {% endif %}
          </label>
        </div>
        {% endfor %}
      </div>
    </div>
    {% endfor %}
  </div>
  <div class="panel-footer text-right">
    <button type="button" id="button-filter" class="btn btn-primary">{{ button_filter }}</button>
  </div>
</div>
<script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	filter = [];

	$('input[name^=\'filter\']:checked').each(function(element) {
		filter.push(this.value);
	});

	location = '{{ action }}&filter=' + filter.join(',');
});
//--></script>
