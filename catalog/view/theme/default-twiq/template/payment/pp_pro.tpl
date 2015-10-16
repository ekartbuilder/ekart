<form class="form-horizontal">
  <fieldset id="payment">
    <legend>{{ text_credit_card }}</legend>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-type">{{ entry_cc_type }}</label>
      <div class="col-sm-10">
        <select name="cc_type" id="input-cc-type" class="form-control">
          {% for card in cards %}
          <option value="{{ card['value'] }}">{{ card['text'] }}</option>
          {% endif %}
        </select>
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-number">{{ entry_cc_number }}</label>
      <div class="col-sm-10">
        <input type="text" name="cc_number" value="" placeholder="{{ entry_cc_number }}" id="input-cc-number" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="input-cc-start-date"><span data-toggle="tooltip" title="{{ help_start_date }}">{{ entry_cc_start_date }}</span></label>
      <div class="col-sm-3">
        <select name="cc_start_date_month" id="input-cc-start-date" class="form-control">
          {% for month in months %}
          <option value="{{ month['value'] }}">{{ month['text'] }}</option>
          {% endif %}
        </select>
      </div>
      <div class="col-sm-3">
        <select name="cc_start_date_year" class="form-control">
          {% for year in year_valid %}
          <option value="{{ year['value'] }}">{{ year['text'] }}</option>
          {% endif %}
        </select>
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-expire-date">{{ entry_cc_expire_date }}</label>
      <div class="col-sm-3">
        <select name="cc_expire_date_month" id="input-cc-expire-date" class="form-control">
          {% for month in months %}
          <option value="{{ month['value'] }}">{{ month['text'] }}</option>
          {% endif %}
        </select>
      </div>
      <div class="col-sm-3">
        <select name="cc_expire_date_year" class="form-control">
          {% for year in year_expire %}
          <option value="{{ year['value'] }}">{{ year['text'] }}</option>
          {% endif %}
        </select>
      </div>
    </div>
    <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-cc-cvv2">{{ entry_cc_cvv2 }}</label>
      <div class="col-sm-10">
        <input type="text" name="cc_cvv2" value="" placeholder="{{ entry_cc_cvv2 }}" id="input-cc-cvv2" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="input-cc-issue"><span data-toggle="tooltip" title="{{ help_issue }}">{{ entry_cc_issue }}</span></label>
      <div class="col-sm-10">
        <input type="text" name="cc_issue" value="" placeholder="{{ entry_cc_issue }}" id="input-cc-issue" class="form-control" />
      </div>
    </div>
  </fieldset>
</form>
<div class="buttons">
  <div class="pull-right">
    <input type="button" value="{{ button_confirm }}" id="button-confirm" data-loading-text="{{ text_loading }}" class="btn btn-primary" />
  </div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
  $.ajax({
    url: 'index.php?route=payment/pp_pro/send',
    type: 'post',
    data: $('#payment :input'),
    dataType: 'json',
    beforeSend: function() {
      $('#button-confirm').attr('disabled', true);
      $('#payment').before('<div class="alert alert-info"><i class="fa fa-info-circle"></i> {{ text_wait }}</div>');
    },
    complete: function() {
      $('#button-confirm').attr('disabled', false);
      $('.attention').remove();
    },
    success: function(json) {
      if (json['error']) {
        alert(json['error']);
      }

      if (json['success']) {
        location = json['success'];
      }
    }
  });
});
//--></script>