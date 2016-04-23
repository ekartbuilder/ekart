<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">

 <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary" onclick="save_template()"><i class="fa fa-save"></i></button>
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
	   <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-template">
	     
	      <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-source" data-toggle="tab">Source</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active in" id="tab-general">
				<div class="form-group hide">
					<label class="col-sm-2 control-label" for="input-theme"><?php echo $entry_theme; ?></label>
					<div class="col-sm-10"><input type="hidden" name="theme" placeholder="<?php echo $entry_theme; ?>" id="input-theme"  value="<?php echo $theme; ?>" class="form-control" />
					<?php if ($error_theme) { ?>
					<div class="text-danger"><?php echo $error_theme; ?></div>
					<?php } ?></div>
			 	</div>

				<div class="form-group required">
					<label class="col-sm-2 control-label" for="input-path"><?php echo $entry_path; ?></label>
				    <div class="col-sm-10"><select name="path" class="form-control"  id="input-path">
					<option value=""></option>
					<?php foreach ($paths as $each_path) { ?>
					<?php if ($each_path['path_id'] == $path) { ?>
						<option value="<?php echo $each_path['path_id']; ?>" selected="selected"><?php echo $each_path['name']; ?></option>
					<?php } else { ?>
						<option value="<?php echo $each_path['path_id']; ?>"><?php echo $each_path['name']; ?></option>
					<?php } ?>
					<?php } ?>
					</select>
					<?php if ($error_path) { ?>
					<div class="text-danger"><?php echo $error_path; ?></div>
					<?php } ?></div>
				</div>

				<div class="form-group required">
					<label class="col-sm-2 control-label" for="editor_html"><?php echo $entry_html; ?></label>
					<div class="col-sm-10"><textarea class="form-control"  placeholder="<?php echo $entry_html; ?>" id="editor_html" rows="10" name="html"><?php echo $html; ?></textarea>
					<?php if ($error_html) { ?>
					<span class="text-danger"><?php echo $error_html; ?></span>
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
	   		</div>
	   		<div class="tab-pane fade" id="tab-source">
	   			
	   			<div class="form-group">
					<label class="col-sm-2 control-label" for="input-path-source"><?php echo $entry_path_source; ?></label>
				    <div class="col-sm-10"><select name="path_source" class="form-control"  id="input-path-source">
					<option value=""></option>
					<?php foreach ($paths as $each_path) { ?>
					<?php if ($each_path['path_id'] == $path) { ?>
						<option value="<?php echo $each_path['path_id']; ?>" selected="selected"><?php echo $each_path['name']; ?></option>
					<?php } else { ?>
						<option value="<?php echo $each_path['path_id']; ?>"><?php echo $each_path['name']; ?></option>
					<?php } ?>
					<?php } ?>
					</select>
				</div>
				
		   		<div class="form-group">
					<label class="col-sm-2 control-label" for="editor_html_source"><?php echo $entry_html_source; ?></label>
					<div class="col-sm-10"><textarea class="form-control"  placeholder="<?php echo $entry_html_source; ?>" id="editor_html_source" rows="10" name="html_source"><?php echo $html_source; ?></textarea>
			  	</div>
		   	</div>
	  	   </div>
	  	   </form>
	  </div>
  </div>

</div>

<script type="text/javascript"><!--
		
		var check_once = 1;
		
		var editor = CodeMirror.fromTextArea(document.getElementById("editor_html"), {
  				lineNumbers: true
			});
		
		var editor_source = CodeMirror.fromTextArea(document.getElementById("editor_html_source"), {
  				lineNumbers: true
			});
			
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  			if(check_once) {
  				check_once = 0;
  				editor_source.refresh();
  			}
		});
		
		$("#input-path").change(function(){
			
			$.ajax({
		  		method: "POST",
		  		url: 'index.php?route=design/template/load_template',
		  		data: { path: $(this).val()},
		  		dataType: 'json',
			})
		  	.done(function( json ) {
			    
			    editor.setValue(json['html']);
			    editor_source.setValue(json['html_source']);
			    
		  	});
		  	
		});
		
		$("#input-path-source").change(function(){
			
			$.ajax({
		  		method: "POST",
		  		url: 'index.php?route=design/template/load_template',
		  		data: { path: $(this).val()},
		  		dataType: 'json',
			})
		  	.done(function( json ) {
			    editor_source.setValue(json['html_source']);
		  	});
		  	
		});
		
		function save_template() {
			
			$("#editor_html").val(editor.getValue());
			
			$.ajax({
		  		method: "POST",
		  		url: 'index.php?route=design/template/save_template',
		  		data: $("#input-theme, #input-path, #input-status, #editor_html"),
		  		dataType: 'json',
			})
		  	.done(function( json ) {
		  		$("#loader").hide();
		  	});
		}
		
//--></script>

<?php echo $footer; ?>