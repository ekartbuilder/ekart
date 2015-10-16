<form class="form-horizontal">
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-firstname">{{ entry_firstname }}</label>
    <div class="col-sm-10">
      <input type="text" name="firstname" value="{{ firstname }}" placeholder="{{ entry_firstname }}" id="input-shipping-firstname" class="form-control" />
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-lastname">{{ entry_lastname }}</label>
    <div class="col-sm-10">
      <input type="text" name="lastname" value="{{ lastname }}" placeholder="{{ entry_lastname }}" id="input-shipping-lastname" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="input-shipping-company">{{ entry_company }}</label>
    <div class="col-sm-10">
      <input type="text" name="company" value="{{ company }}" placeholder="{{ entry_company }}" id="input-shipping-company" class="form-control" />
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-address-1">{{ entry_address_1 }}</label>
    <div class="col-sm-10">
      <input type="text" name="address_1" value="{{ address_1 }}" placeholder="{{ entry_address_1 }}" id="input-shipping-address-1" class="form-control" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="input-shipping-address-2">{{ entry_address_2 }}</label>
    <div class="col-sm-10">
      <input type="text" name="address_2" value="{{ address_2 }}" placeholder="{{ entry_address_2 }}" id="input-shipping-address-2" class="form-control" />
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-city">{{ entry_city }}</label>
    <div class="col-sm-10">
      <input type="text" name="city" value="{{ city }}" placeholder="{{ entry_city }}" id="input-shipping-city" class="form-control" />
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-postcode">{{ entry_postcode }}</label>
    <div class="col-sm-10">
      <input type="text" name="postcode" value="{{ postcode }}" placeholder="{{ entry_postcode }}" id="input-shipping-postcode" class="form-control" />
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-country">{{ entry_country }}</label>
    <div class="col-sm-10">
      <select name="country_id" id="input-shipping-country" class="form-control">
        <option value="">{{ text_select }}</option>
        {% for country in countries %}
        {% if country.country_id == country_id %}
        <option value="{{ country.country_id }}" selected="selected">{{ country.name }}</option>
        {% else %}
        <option value="{{ country.country_id }}">{{ country.name }}</option>
        {% endif %}
        {% endfor %}
      </select>
    </div>
  </div>
  <div class="form-group required">
    <label class="col-sm-2 control-label" for="input-shipping-zone">{{ entry_zone }}</label>
    <div class="col-sm-10">
      <select name="zone_id" id="input-shipping-zone" class="form-control">
      </select>
    </div>
  </div>  
  <div class="buttons">
    <div class="pull-right">
      <input type="button" value="{{ button_continue }}" id="button-guest-shipping" data-loading-text="{{ text_loading }}" class="btn btn-primary" />
    </div>
  </div>
</form>
<script type="text/javascript"><!--
// Sort the custom fields
$('#collapse-shipping-address .form-group[data-sort]').detach().each(function() {
	if ($(this).attr('data-sort') >= 0 && $(this).attr('data-sort') <= $('#collapse-shipping-address .form-group').length) {
		$('#collapse-shipping-address .form-group').eq($(this).attr('data-sort')).before(this);
	}

	if ($(this).attr('data-sort') > $('#collapse-shipping-address .form-group').length) {
		$('#collapse-shipping-address .form-group:last').after(this);
	}

	if ($(this).attr('data-sort') < -$('#collapse-shipping-address .form-group').length) {
		$('#collapse-shipping-address .form-group:first').before(this);
	}
});
//--></script>
<script type="text/javascript"><!--
$('#collapse-shipping-address button[id^=\'button-shipping-custom-field\']').on('click', function() {
	var node = this;

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$(node).parent().find('.text-danger').remove();

					if (json['error']) {
						$(node).parent().find('input[name^=\'custom_field\']').after('<div class="text-danger">' + json['error'] + '</div>');
					}

					if (json['success']) {
						alert(json['success']);

						$(node).parent().find('input[name^=\'custom_field\']').attr('value', json['file']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script>
<script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.time').datetimepicker({
	pickDate: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});
//--></script>
<script type="text/javascript"><!--
$('#collapse-shipping-address select[name=\'country_id\']').on('change', function() {
	$.ajax({
		url: 'index.php?route=checkout/checkout/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('#collapse-shipping-address select[name=\'country_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
		},
		complete: function() {
			$('.fa-spin').remove();
		},
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#collapse-shipping-address input[name=\'postcode\']').parent().parent().addClass('required');
			} else {
				$('#collapse-shipping-address input[name=\'postcode\']').parent().parent().removeClass('required');
			}

			html = '<option value="">{{ text_select }}</option>';

			if (json['zone'] && json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
					html += '<option value="' + json['zone'][i]['zone_id'] + '"';

					if (json['zone'][i]['zone_id'] == '{{ zone_id }}') {
						html += ' selected="selected"';
          			}

					html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected">{{ text_none }}</option>';
			}

			$('#collapse-shipping-address select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('#collapse-shipping-address select[name=\'country_id\']').trigger('change');
//--></script>