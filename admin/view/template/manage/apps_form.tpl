<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">

 <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
   <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
	   <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-apps">
	     
<div class="form-group">
				<label class="col-sm-2 control-label" for="input-image"><?php echo $entry_image; ?></label>
				<div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb; ?>" alt="" title=""  /></a>
     <input type="hidden" name="image" value="<?php echo $image; ?>" id="input-image" />
				<?php if ($error_image) { ?>
				<span class="text-danger"><?php echo $error_image; ?></span>
				<?php } ?></div>
			  </div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
				<div class="col-sm-10"><input type="text" name="name" placeholder="<?php echo $entry_name; ?>" id="input-name"  value="<?php echo $name; ?>" class="form-control" />
				<?php if ($error_name) { ?>
				<div class="text-danger"><?php echo $error_name; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-short_info"><?php echo $entry_short_info; ?></label>
				<div class="col-sm-10"><textarea class="form-control" name="short_info"  placeholder="<?php echo $entry_short_info; ?>" cols="50" rows="5" id="input-short_info"><?php echo $short_info; ?></textarea>
				<?php if ($error_short_info) { ?>
				<div class="text-danger"><?php echo $error_short_info; ?></div>
				<?php } ?></div>
			  </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-type"><?php echo $entry_type; ?></label>
			    <div class="col-sm-10"><select name="type" class="form-control"  id="input-type">
				<option value=""></option>
				<?php foreach ($types as $each_type) { ?>
				<?php if ($each_type['type_id'] == $type) { ?>
					<option value="<?php echo $each_type['type_id']; ?>" selected="selected"><?php echo $each_type['name']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $each_type['type_id']; ?>"><?php echo $each_type['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				<?php if ($error_type) { ?>
				<div class="text-danger"><?php echo $error_type; ?></div>
				<?php } ?></div>
				</div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-category"><?php echo $entry_category; ?></label>
			    <div class="col-sm-10"><select name="category" class="form-control"  id="input-category">
				<option value=""></option>
				<?php foreach ($categorys as $each_category) { ?>
				<?php if ($each_category['category_id'] == $category) { ?>
					<option value="<?php echo $each_category['category_id']; ?>" selected="selected"><?php echo $each_category['name']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $each_category['category_id']; ?>"><?php echo $each_category['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				<?php if ($error_category) { ?>
				<div class="text-danger"><?php echo $error_category; ?></div>
				<?php } ?></div>
				</div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-route"><?php echo $entry_route; ?></label>
				<div class="col-sm-10"><input type="text" name="auto_route" placeholder="<?php echo $entry_route; ?>" id="input-route"  value="<?php echo $auto_route; ?>" class="form-control" />
				<?php if ($error_route) { ?>
				<div class="text-danger"><?php echo $error_route; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-link"><?php echo $entry_link; ?></label>
				<div class="col-sm-10"><input type="text" name="link" placeholder="<?php echo $entry_link; ?>" id="input-link"  value="<?php echo $link; ?>" class="form-control" />
				<?php if ($error_link) { ?>
				<div class="text-danger"><?php echo $error_link; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
			    <div class="col-sm-10"><select name="status" class="form-control"  id="input-status">
				<option value=""></option>
				<?php foreach ($statuss as $each_status) { ?>
				<?php if ($each_status['status_id'] == $status) { ?>
					<option value="<?php echo $each_status['status_id']; ?>" selected="selected"><?php echo $each_status['name']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $each_status['status_id']; ?>"><?php echo $each_status['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				<?php if ($error_status) { ?>
				<div class="text-danger"><?php echo $error_status; ?></div>
				<?php } ?></div>
				</div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-description"><?php echo $entry_description; ?></label>
				<div class="col-sm-10"><textarea class="form-control"  placeholder="<?php echo $entry_description; ?>" id="editor_description" name="description"><?php echo $description; ?></textarea>
				<?php if ($error_description) { ?>
				<span class="text-danger"><?php echo $error_description; ?></span>
				<?php } ?></div>
			  </div>

	   
	      
	   </form>
	   </div>
	
	  
	  
	  
	  </div>
  </div>

</div>

<script type="text/javascript"><!--
		$('#editor_description').summernote({height: 300});
//--></script>

<script type="text/javascript"><!--
		$('input[name=\'auto_route\']').autocomplete({
	'source': function(request, response) {
 $.ajax({
 url: 'index.php?route=manage/apps/autocomplete&token=<?php echo $token; ?>&filter_route= ' +  encodeURIComponent(request),
 dataType: 'json',
success: function(json) {
response($.map(json, function(item) {
return {
label: item['name'],
value: item['manufacturer_id']
}
	}));
}
});
},
'select': function(item) {
$('input[name=\'auto_route\']').val(item['label']);
},
});
//--></script>

<?php echo $footer; ?>