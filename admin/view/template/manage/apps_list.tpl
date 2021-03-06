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
          					 <div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-app_id"><?php echo $entry_app_id; ?></label>
<input type="text" id="input-app_id" name="filter_app_id" value="<?php echo $filter_app_id; ?>" size="12" class="form-control" /></div></div>
				 <div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
<input type="text" id="input-name" name="filter_name" value="<?php echo $filter_name; ?>" size="12" class="form-control" /></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-type"><?php echo $entry_type; ?></label>
<select name="filter_type" id = "input-type" class="form-control">
				<option value="*"></option>
				<?php foreach ($types as $each_type) { ?>
				<?php if ($each_type['type_id'] == $filter_type) { ?>
				<option value="<?php echo $each_type['type_id']; ?>" selected="selected"><?php echo $each_type['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_type['type_id']; ?>"><?php echo $each_type['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-category"><?php echo $entry_category; ?></label>
<select name="filter_category" id = "input-category" class="form-control">
				<option value="*"></option>
				<?php foreach ($categorys as $each_category) { ?>
				<?php if ($each_category['category_id'] == $filter_category) { ?>
				<option value="<?php echo $each_category['category_id']; ?>" selected="selected"><?php echo $each_category['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_category['category_id']; ?>"><?php echo $each_category['name']; ?></option>
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
              
			  <td class="left"><?php if ($sort == 'app_id') { ?>
				<a href="<?php echo $sort_app_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_app_id; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_app_id; ?>"><?php echo $column_app_id; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'image') { ?>
				<a href="<?php echo $sort_image; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_image; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_image; ?>"><?php echo $column_image; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'name') { ?>
				<a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'type') { ?>
				<a href="<?php echo $sort_type; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_type; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_type; ?>"><?php echo $column_type; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'category') { ?>
				<a href="<?php echo $sort_category; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_category; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_category; ?>"><?php echo $column_category; ?></a>
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
					
            <?php if ($appss) { ?>
            <?php foreach ($appss as $apps) { ?>
            <tr>
              <td class="text-center"><?php if ($apps['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $apps['app_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $apps['app_id']; ?>" />
                <?php } ?></td>
              
	 <td class="text-left"><?php echo $apps['app_id']; ?></td>
<?php if($apps['image']) { ?>
<td class="text-left"><img src="<?php echo $apps['image']; ?>"  class="img-thumbnail" />
<?php } else { ?>
<span class="img-thumbnail list"><i class="fa fa-camera fa-2x"></i></span>
<?php } ?></td>
	 <td class="text-left"><?php echo $apps['name']; ?></td>
	 <td class="text-left"><?php echo $apps['type']; ?></td>
	 <td class="text-left"><?php echo $apps['category']; ?></td>
	 <td class="text-left"><?php echo $apps['date_added']; ?></td>
	 <td class="text-left"><?php echo $apps['status']; ?></td>
              <td class="text-right"><a href="<?php echo $apps['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="9"><?php echo $text_no_results; ?></td>
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
	url = 'index.php?route=manage/apps&token=<?php echo $token; ?>';

	var filter_app_id = $('input[name=\'filter_app_id\']').val();
	if (filter_app_id) {
		url += '&filter_app_id=' + encodeURIComponent(filter_app_id);
	}

	var filter_name = $('input[name=\'filter_name\']').val();
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}

	var filter_type = $('select[name=\'filter_type\']').val();
	if (filter_type != '*') {
		url += '&filter_type=' + encodeURIComponent(filter_type);
	}

	var filter_category = $('select[name=\'filter_category\']').val();
	if (filter_category != '*') {
		url += '&filter_category=' + encodeURIComponent(filter_category);
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