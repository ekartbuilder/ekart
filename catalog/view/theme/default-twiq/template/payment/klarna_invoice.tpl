{% if error_warning %}
<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>
{% endif %}
<p><img src="https://cdn.klarna.com/public/images/{{ iso_code_2 }}/badges/v1/invoice/{{ iso_code_2 }}_invoice_badge_std_blue.png?width=150&eid={{ merchant ?>" /></p>
<form id="payment" class="form-horizontal">
  <fieldset>
    <legend><?php echo $text_additional }}</legend>
    <?php if (!$company) { ?>
    <?php if ($iso_code_3 == 'DEU' || $iso_code_3 == 'NLD') { ?>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-dob">{{ entry_dob }}</label>
      <div class="col-sm-3">
        <select name="pno_day" id="input-dob" class="form-control">
          <option value="">{{ text_day }}</option>
          {% for day in days %}
          <option value="{{ day['value'] }}">{{ day['text'] }}</option>
          {% endif %}
        </select>
      </div>
      <div class="col-sm-3">
        <select name="pno_month" class="form-control">
          <option value="">{{ text_month }}</option>
          {% for month in months %}
          <option value="{{ month['value'] }}">{{ month['text'] }}</option>
          {% endif %}
        </select>
      </div>
      <div class="col-sm-3">
        <select name="pno_year" class="form-control">
          <option value="">{{ text_year }}</option>
          {% for year in years %}
          <option value="{{ year['value'] }}">{{ year['text'] }}</option>
          {% endif %}
        </select>
      </div>
    </div>
    {% else %}
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-pno">{{ entry_pno }}</label>
      <div class="col-sm-10">
        <input type="text" name="pno" value="" id="input-pno" class="form-control" />
      </div>
    </div>
    {% endif %}
    {% else %}
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-company">{{ entry_company }}</label>
      <div class="col-sm-10">
        <input type="text" name="pno" value="" id="input-company" class="form-control" />
      </div>
    </div>
    {% endif %}
    <?php if ($iso_code_3 == 'DEU' || $iso_code_3 == 'NLD') { ?>
    <div class="form-group required">
      <label class="col-sm-2 control-label">{{ entry_gender }}</label>
      <div class="col-sm-10">
        <label class="radio-inline">
          <input type="radio" name="gender" value="1" />
          {{ text_male }}</label>
        <label class="radio-inline">
          <input type="radio" name="gender" value="0" />
          {{ text_female }}</label>
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-street">{{ entry_street }}</label>
      <div class="col-sm-10">
        <input type="text" name="street" value="{{ street }}" id="input-street" class="form-control" />
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-house-no">{{ entry_house_no }}</label>
      <div class="col-sm-10">
        <input type="text" name="house_no" value="{{ street_number }}" id="input-house-no" class="form-control" />
      </div>
    </div>
    {% endif %}
    {% if iso_code_3 == 'NLD' %}
    <div class="form-group">
      <label class="col-sm-2 control-label" for="input-house-ext">{{ entry_house_ext }}</label>
      <div class="col-sm-10">
        <input type="text" name="house_ext" value="{{ street_extension }}" id="input-house-ext" class="form-control" />
      </div>
    </div>
    {% endif %}
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-phone-no">{{ entry_phone_no }}</label>
      <div class="col-sm-10">
        <input type="text" name="phone_no" value="{{ phone_number }}" id="input-phone-no" class="form-control" />
      </div>
    </div>
    {% if iso_code_3 == 'DEU' %}
    <div class="radio">
      <input type="checkbox" name="deu_terms" value="1" />
      Mit der Übermittlung der für die Abwicklung des Rechnungskaufes und einer Identitäts - und Bonitätsprüfung erforderlichen
      Daten an Klarna bin ich einverstanden. Meine <a href="https://online.klarna.com/consent_de.yaws" target="_blank">Einwilligung</a> kann ich jederzeit mit Wirkung für die Zukunft widerrufen. </div>
    {% endif %}
  </fieldset>
</form>
<div class="buttons">
  <div class="pull-right">
    <input type="button" value="{{ button_confirm }}" id="button-confirm" data-loading-text="{{ text_loading }}" class="btn btn-primary" />
  </div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').on('click', function() {
	$.ajax({
		url: 'index.php?route=payment/klarna_invoice/send',
		type: 'post',
		data: $('#payment input[type=\'text\'], #payment input[type=\'checkbox\']:checked, #payment input[type=\'radio\']:checked, #payment select'),
		dataType: 'json',
		cache: false,
		beforeSend: function() {
			$('#button-confirm').button('loading');
		},
		complete: function() {
			$('#button-confirm').button('reset');
		},
		success: function(json) {
			$('.alert').remove();

			if (json['error']) {
				$('#payment').before('<div class="alert alert-danger">' + json['error'] + '</div>');
			}

			if (json['redirect']) {
				location = json['redirect'];
			}
		}
	});
});
//--></script>