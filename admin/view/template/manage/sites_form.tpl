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
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  
   <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
	   <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-sites">
	     
<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-sub_domain"><?php echo $entry_sub_domain; ?></label>
				<div class="col-sm-10"><input type="text" name="sub_domain" placeholder="<?php echo $entry_sub_domain; ?>" id="input-sub_domain"  value="<?php echo $sub_domain; ?>" class="form-control" />
				<?php if ($error_sub_domain) { ?>
				<div class="text-danger"><?php echo $error_sub_domain; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-domain"><?php echo $entry_domain; ?></label>
				<div class="col-sm-10"><input type="text" name="domain" placeholder="<?php echo $entry_domain; ?>" id="input-domain"  value="<?php echo $domain; ?>" class="form-control" />
				<?php if ($error_domain) { ?>
				<div class="text-danger"><?php echo $error_domain; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-owner_id"><?php echo $entry_owner_id; ?></label>
				<div class="col-sm-10"><input type="text" name="owner_id" placeholder="<?php echo $entry_owner_id; ?>" id="input-owner_id"  value="<?php echo $owner_id; ?>" class="form-control" />
				<?php if ($error_owner_id) { ?>
				<div class="text-danger"><?php echo $error_owner_id; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-plan_id"><?php echo $entry_plan_id; ?></label>
			    <div class="col-sm-10"><select name="plan_id" class="form-control"  id="input-plan_id">
				<option value=""></option>
				<?php foreach ($plan_ids as $each_plan_id) { ?>
				<?php if ($each_plan_id['plan_id'] == $plan_id) { ?>
					<option value="<?php echo $each_plan_id['plan_id']; ?>" selected="selected"><?php echo $each_plan_id['name']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $each_plan_id['plan_id']; ?>"><?php echo $each_plan_id['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				<?php if ($error_plan_id) { ?>
				<div class="text-danger"><?php echo $error_plan_id; ?></div>
				<?php } ?></div>
				</div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-site_type"><?php echo $entry_site_type; ?></label>
			    <div class="col-sm-10"><select name="site_type" class="form-control"  id="input-site_type">
				<option value=""></option>
				<?php foreach ($site_types as $each_site_type) { ?>
				<?php if ($each_site_type['site_type_id'] == $site_type) { ?>
					<option value="<?php echo $each_site_type['site_type_id']; ?>" selected="selected"><?php echo $each_site_type['name']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $each_site_type['site_type_id']; ?>"><?php echo $each_site_type['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				<?php if ($error_site_type) { ?>
				<div class="text-danger"><?php echo $error_site_type; ?></div>
				<?php } ?></div>
				</div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-live_date"><?php echo $entry_live_date; ?></label>
				<div class="col-sm-10"><div class="input-group datetime"><input type="text" name="live_date" id="input-live_date" value="<?php echo $live_date; ?>" class="form-control" data-date-format="YYYY-MM-DD HH:mm"  placeholder="<?php echo $entry_live_date; ?>" />
             <span class="input-group-btn">
               <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
               </span>
				<?php if ($error_live_date) { ?>
				<div class="text-danger"><?php echo $error_live_date; ?></div>
				<?php } ?></div></div>
			  </div>

<div class="form-group">
				<label class="col-sm-2 control-label" for="input-active_status"><?php echo $entry_active_status; ?></label>
			    <div class="col-sm-10"><select name="active_status" class="form-control"  id="input-active_status">
				<option value=""></option>
				<?php foreach ($active_statuss as $each_active_status) { ?>
				<?php if ($each_active_status['active_status_id'] == $active_status) { ?>
					<option value="<?php echo $each_active_status['active_status_id']; ?>" selected="selected"><?php echo $each_active_status['name']; ?></option>
				<?php } else { ?>
					<option value="<?php echo $each_active_status['active_status_id']; ?>"><?php echo $each_active_status['name']; ?></option>
				<?php } ?>
				<?php } ?>
				</select>
				<?php if ($error_active_status) { ?>
				<div class="text-danger"><?php echo $error_active_status; ?></div>
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

	   
	   </form>
	   </div>
	  
	  
	  
	  </div>
  </div>

</div>
<script type="text/javascript"><!--
	$(document).ready(function() {
		$('.date').datetimepicker({pickTime: false});
		$('.datetime').datetimepicker({pickDate: true, pickTime: true});
	});
//--></script>

<?php echo $footer; ?>