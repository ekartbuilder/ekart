<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <?php if ($success) { ?>
  <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?></div>
  <?php } ?>
  <?php if ($error_warning) { ?>
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      <div class="row">
        <div class="col-sm-6">
          Sample Text
        </div>
        <div class="col-sm-6">
          <div>
            <h2><?php echo $text_register; ?></h2>
            <p><strong><?php echo $text_register_help; ?></strong></p>
            <form id="site-register" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label" for="input-site"><?php echo $entry_site; ?></label>
                <input type="text" name="site" value="<?php echo $site; ?>" placeholder="<?php echo $entry_site; ?>" id="input-site-site" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-contact"><?php echo $entry_contact; ?></label>
                <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="<?php echo $entry_contact; ?>" id="input-site-contact" class="form-control" />
              </div>            	
              <div class="form-group">
                <label class="control-label" for="input-email"><?php echo $entry_email; ?></label>
                <input type="text" name="email" value="<?php echo $email; ?>" placeholder="<?php echo $entry_email; ?>" id="input-site-email" class="form-control" />
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password"><?php echo $entry_password; ?></label>
                <input type="password" name="password" value="<?php echo $password; ?>" placeholder="<?php echo $entry_password; ?>" id="input-site-password" class="form-control" />
              </div>
              <input type="button" value="<?php echo $button_continue; ?>" id="button-continue"  data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary" />
              <input type="hidden" name="plan" value="5" />
              <input type="hidden" name="type" value="E" />
              <?php if ($redirect) { ?>
              <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<script type="text/javascript"><!--
// Continue
$(document).delegate('#button-continue', 'click', function() {
    $.ajax({
        url: 'index.php?route=create/site/save',
        type: 'post',
        data: $('#site-register :input'),
        dataType: 'json',
        beforeSend: function() {
        	$('#button-continue').button('loading');
		},
        complete: function() {
            $('#button-continue').button('reset');
        },
        success: function(json) {
            $('.alert, .text-danger').remove();
            $('.form-group').removeClass('has-error');

            if (json['redirect']) {
                location = json['redirect'];
            } else if (json['error']) {
                $('#site-register').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

				for (i in json['error']) {
					var element = $('#input-site-' + i.replace('_', '-'));

					if ($(element).parent().hasClass('input-group')) {
						$(element).parent().after('<div class="text-danger">' + json['error'][i] + '</div>');
					} else {
						$(element).after('<div class="text-danger">' + json['error'][i] + '</div>');
					}
				}
				
				// Highlight any found errors
				$('.text-danger').parent().addClass('has-error');
		   }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
//--></script>
<?php echo $footer; ?>