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
          					 <div class="col-sm-4"><div class="form-group"><label class="control-label" for="input-theme"><?php echo $entry_theme; ?></label>
<input type="text" id="input-theme" name="filter_theme" value="<?php echo $filter_theme; ?>" size="12" class="form-control" /></div></div>
				<div class="col-sm-4"><div class="form-group"> <label class="control-label" for="input-path"><?php echo $entry_path; ?></label>
<select name="filter_path" id = "input-path" class="form-control">
				<option value="*"></option>
				<?php foreach ($paths as $each_path) { ?>
				<?php if ($each_path['path_id'] == $filter_path) { ?>
				<option value="<?php echo $each_path['path_id']; ?>" selected="selected"><?php echo $each_path['name']; ?></option>
				<?php } else { ?>
				<option value="<?php echo $each_path['path_id']; ?>"><?php echo $each_path['name']; ?></option>
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
              
			  <td class="left"><?php if ($sort == 'template_id') { ?>
				<a href="<?php echo $sort_template_id; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_template_id; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_template_id; ?>"><?php echo $column_template_id; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'theme') { ?>
				<a href="<?php echo $sort_theme; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_theme; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_theme; ?>"><?php echo $column_theme; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'path') { ?>
				<a href="<?php echo $sort_path; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_path; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_path; ?>"><?php echo $column_path; ?></a>
				<?php } ?></td>

			  <td class="left"><?php if ($sort == 'date_modified') { ?>
				<a href="<?php echo $sort_date_modified; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_modified; ?></a>
				<?php } else { ?>
				<a href="<?php echo $sort_date_modified; ?>"><?php echo $column_date_modified; ?></a>
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
					
            <?php if ($templates) { ?>
            <?php foreach ($templates as $template) { ?>
            <tr>
              <td class="text-center"><?php if ($template['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $template['template_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $template['template_id']; ?>" />
                <?php } ?></td>
              
	 <td class="text-left"><?php echo $template['template_id']; ?></td>
	 <td class="text-left"><?php echo $template['theme']; ?></td>
	 <td class="text-left"><?php echo $template['path']; ?></td>
	 <td class="text-left"><?php echo $template['date_modified']; ?></td>
	 <td class="text-left"><?php echo $template['status']; ?></td>
              <td class="text-right"><a href="<?php echo $template['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="7"><?php echo $text_no_results; ?></td>
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
	url = 'index.php?route=design/template&token=<?php echo $token; ?>';

	var filter_theme = $('input[name=\'filter_theme\']').val();
	if (filter_theme) {
		url += '&filter_theme=' + encodeURIComponent(filter_theme);
	}

	var filter_path = $('select[name=\'filter_path\']').val();
	if (filter_path != '*') {
		url += '&filter_path=' + encodeURIComponent(filter_path);
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