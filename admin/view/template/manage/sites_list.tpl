<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">

 <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-coupon').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  
  
    <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
	 <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
	  <div class="well">
          <div class="row">
          					 <div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-sub_domain"><?php echo $entry_sub_domain; ?></label>
<input type="text" id="input-sub_domain" name="filter_sub_domain" value="<?php echo $filter_sub_domain; ?>" size="12" class="form-control" /></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-plan_id"><?php echo $entry_plan_id; ?></label>
<select name="filter_plan_id" id = "input-plan_id" class="form-control">
				<option value="*"></option>
				<?php foreach ($plans as $each_plan) { ?>
				<?php if ($each_plan['plan_id'] == $filter_plan_id) { ?>
				<option value="<?php echo $each_plan['plan_id']; ?>" selected="selected"><?php echo $each_plan['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_plan['plan_id']; ?>"><?php echo $each_plan['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select></div></div>
				 <div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-owner_id"><?php echo $entry_owner_id; ?></label>
<input type="text" id="input-owner_id" name="filter_owner_id" value="<?php echo $filter_owner_id; ?>" size="12" class="form-control" /></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-site_type"><?php echo $entry_site_type; ?></label>
<select name="filter_site_type" id = "input-site_type" class="form-control">
				<option value="*"></option>
				<?php foreach ($site_types as $each_site_type) { ?>
				<?php if ($each_site_type['site_type_id'] == $filter_site_type) { ?>
				<option value="<?php echo $each_site_type['site_type_id']; ?>" selected="selected"><?php echo $each_site_type['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_site_type['site_type_id']; ?>"><?php echo $each_site_type['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select></div></div>
				<div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-live_date"><?php echo $entry_live_date; ?></label>
<div class="input-group datetime">
<input type="text" name="filter_live_date" id="input-live_date" value="<?php echo $filter_live_date; ?>" size="12" data-date-format="YYYY-MM-DD HH:mm" class="form-control"/>
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-active_status"><?php echo $entry_active_status; ?></label>
<select name="filter_active_status" id = "input-active_status" class="form-control">
				<option value="*"></option>
				<?php foreach ($active_statuss as $each_active_status) { ?>
				<?php if ($each_active_status['active_status_id'] == $filter_active_status) { ?>
				<option value="<?php echo $each_active_status['active_status_id']; ?>" selected="selected"><?php echo $each_active_status['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_active_status['active_status_id']; ?>"><?php echo $each_active_status['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select></div></div>
				<div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-date_added"><?php echo $entry_date_added; ?></label>
<div class="input-group date">
<input type="text" name="filter_date_added" id="input-date_added" value="<?php echo $filter_date_added; ?>" size="12" data-date-format="YYYY-MM-DD" class="form-control"/>
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-status"><?php echo $entry_status; ?></label>
<select name="filter_status" id = "input-status" class="form-control">
				<option value="*"></option>
				<?php foreach ($statuss as $each_status) { ?>
				<?php if ($each_status['status_id'] == $filter_status) { ?>
				<option value="<?php echo $each_status['status_id']; ?>" selected="selected"><?php echo $each_status['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_status['status_id']; ?>"><?php echo $each_status['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select></div></div>
	<div class="col-sm-12"><div class="form-group"><a onclick="filter();" class="btn btn-primary pull-right"><i class="fa fa-search"></i><?php echo $button_filter; ?></a></div></div>
 
        </div></div>
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
             <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
              
			  <td class="left"><?php if ($sort == 'sub_domain') { ?>
				<a href="<?php echo $sort_sub_domain; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_sub_domain; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_sub_domain; ?>"><?php echo $column_sub_domain; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'plan_id') { ?>
				<a href="<?php echo $sort_plan_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_plan_id; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_plan_id; ?>"><?php echo $column_plan_id; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'owner_id') { ?>
				<a href="<?php echo $sort_owner_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_owner_id; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_owner_id; ?>"><?php echo $column_owner_id; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'domain') { ?>
				<a href="<?php echo $sort_domain; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_domain; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_domain; ?>"><?php echo $column_domain; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'site_type') { ?>
				<a href="<?php echo $sort_site_type; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_site_type; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_site_type; ?>"><?php echo $column_site_type; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'live_date') { ?>
				<a href="<?php echo $sort_live_date; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_live_date; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_live_date; ?>"><?php echo $column_live_date; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'active_status') { ?>
				<a href="<?php echo $sort_active_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_active_status; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_active_status; ?>"><?php echo $column_active_status; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'date_added') { ?>
				<a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'status') { ?>
				<a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
				<?php } ?></td>
              
               <td class="text-right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
					
            <?php if ($sitess) { ?>
            <?php foreach ($sitess as $sites) { ?>
            <tr>
              <td class="text-center"><?php if ($sites['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $sites['site_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $sites['site_id']; ?>" />
                <?php } ?></td>
              
	 <td class="text-left"><?php echo $sites['sub_domain']; ?></td>
	 <td class="text-left"><?php echo $sites['plan_id']; ?></td>
	 <td class="text-left"><?php echo $sites['owner_id']; ?></td>
	 <td class="text-left"><?php echo $sites['domain']; ?></td>
	 <td class="text-left"><?php echo $sites['site_type']; ?></td>
	 <td class="text-left"><?php echo $sites['live_date']; ?></td>
	 <td class="text-left"><?php echo $sites['active_status']; ?></td>
	 <td class="text-left"><?php echo $sites['date_added']; ?></td>
	 <td class="text-left"><?php echo $sites['status']; ?></td>
              <td class="text-right"><a href="<?php echo $sites['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="11"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
		
      </form>
	   </div>
     <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
     </div>
   
  </div>
</div>
</div>
</div>

<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=manage/sites&token=<?php echo $token; ?>';

	var filter_sub_domain = $('input[name=\'filter_sub_domain\']').val();
	if (filter_sub_domain) {
		url += '&filter_sub_domain=' + encodeURIComponent(filter_sub_domain);
	}

	var filter_plan_id = $('select[name=\'filter_plan_id\']').val();
	if (filter_plan_id != '*') {
		url += '&filter_plan_id=' + encodeURIComponent(filter_plan_id);
	}

	var filter_owner_id = $('input[name=\'filter_owner_id\']').val();
	if (filter_owner_id) {
		url += '&filter_owner_id=' + encodeURIComponent(filter_owner_id);
	}

	var filter_site_type = $('select[name=\'filter_site_type\']').val();
	if (filter_site_type != '*') {
		url += '&filter_site_type=' + encodeURIComponent(filter_site_type);
	}

	var filter_live_date = $('input[name=\'filter_live_date\']').val();
	if (filter_live_date) {
		url += '&filter_live_date=' + encodeURIComponent(filter_live_date);
	}

	var filter_active_status = $('select[name=\'filter_active_status\']').val();
	if (filter_active_status != '*') {
		url += '&filter_active_status=' + encodeURIComponent(filter_active_status);
	}

	var filter_date_added = $('input[name=\'filter_date_added\']').val();
	if (filter_date_added) {
		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
	}

	var filter_status = $('select[name=\'filter_status\']').val();
	if (filter_status != '*') {
		url += '&filter_status=' + encodeURIComponent(filter_status);
	}

		location = url;
}
//--></script>
<script type="text/javascript"><!--
	$(document).ready(function() {
		$('.date').datetimepicker({pickTime: false});
		$('.datetime').datetimepicker({pickDate: true, pickTime: true});
	});
//--></script>
<script type="text/javascript"><!--
	$('#form input').keydown(function(e) {
		if (e.keyCode == 13) {
			filter();
		}
	});
//--></script>

<script type="text/javascript"><!--
//--></script>

<?php echo $footer; ?>