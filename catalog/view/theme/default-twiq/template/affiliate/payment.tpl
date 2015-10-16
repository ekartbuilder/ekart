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
      <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <legend>{{ text_your_payment }}</legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-tax">{{ entry_tax }}</label>
            <div class="col-sm-10">
              <input type="text" name="tax" value="{{ tax }}" placeholder="{{ entry_tax }}" id="input-tax" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">{{ entry_payment }}</label>
            <div class="col-sm-10">
              <div class="radio">
                <label>
                  {% if payment == 'cheque' %}
                  <input type="radio" name="payment" value="cheque" checked="checked" />
                  {% else %}
                  <input type="radio" name="payment" value="cheque" />
                  {% endif %}
                  {{ text_cheque }}</label>
              </div>
              <div class="radio">
                <label>
                  {% if payment == 'paypal' %}
                  <input type="radio" name="payment" value="paypal" checked="checked" />
                  {% else %}
                  <input type="radio" name="payment" value="paypal" />
                  {% endif %}
                  {{ text_paypal }}</label>
              </div>
              <div class="radio">
                <label>
                  {% if payment == 'bank' %}
                  <input type="radio" name="payment" value="bank" checked="checked" />
                  {% else %}
                  <input type="radio" name="payment" value="bank" />
                  {% endif %}
                  {{ text_bank }}</label>
              </div>
            </div>
          </div>
          <div class="form-group payment" id="payment-cheque">
            <label class="col-sm-2 control-label" for="input-cheque">{{ entry_cheque }}</label>
            <div class="col-sm-10">
              <input type="text" name="cheque" value="{{ cheque }}" placeholder="{{ entry_cheque }}" id="input-cheque" class="form-control" />
            </div>
          </div>
          <div class="form-group payment" id="payment-paypal">
            <label class="col-sm-2 control-label" for="input-paypal">{{ entry_paypal }}</label>
            <div class="col-sm-10">
              <input type="text" name="paypal" value="{{ paypal }}" placeholder="{{ entry_paypal }}" id="input-paypal" class="form-control" />
            </div>
          </div>
          <div class="payment" id="payment-bank">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-bank-name">{{ entry_bank_name }}</label>
              <div class="col-sm-10">
                <input type="text" name="bank_name" value="{{ bank_name }}" placeholder="{{ entry_bank_name }}" id="input-bank-name" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-bank-branch-number">{{ entry_bank_branch_number }}</label>
              <div class="col-sm-10">
                <input type="text" name="bank_branch_number" value="{{ bank_branch_number }}" placeholder="{{ entry_bank_branch_number }}" id="input-bank-branch-number" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-bank-swift-code">{{ entry_bank_swift_code }}</label>
              <div class="col-sm-10">
                <input type="text" name="bank_swift_code" value="{{ bank_swift_code }}" placeholder="{{ entry_bank_swift_code }}" id="input-bank-swift-code" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-bank-account-name">{{ entry_bank_account_name }}</label>
              <div class="col-sm-10">
                <input type="text" name="bank_account_name" value="{{ bank_account_name }}" placeholder="{{ entry_bank_account_name }}" id="input-bank-account-name" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-bank-account-number">{{ entry_bank_account_number }}</label>
              <div class="col-sm-10">
                <input type="text" name="bank_account_number" value="{{ bank_account_number }}" placeholder="{{ entry_bank_account_number }}" id="input-bank-account-number" class="form-control" />
              </div>
            </div>
          </div>
        </fieldset>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="{{ back }}" class="btn btn-default">{{ button_back }}</a></div>
          <div class="pull-right">
            <input type="submit" value="{{ button_continue }}" class="btn btn-primary" />
          </div>
        </div>
      </form>
      {{ content_bottom }}</div>
    {{ column_right }}</div>
</div>
<script type="text/javascript"><!--
$('input[name=\'payment\']').on('change', function() {
    $('.payment').hide();

    $('#payment-' + this.value).show();
});

$('input[name=\'payment\']:checked').trigger('change');
//--></script>
{{ footer }}