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
	   <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-owners">
	     
<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-firstname"><?php echo $entry_firstname; ?></label>
				<div class="col-sm-10"><input type="text" name="firstname" placeholder="<?php echo $entry_firstname; ?>" id="input-firstname"  value="<?php echo $firstname; ?>" class="form-control" />
				<?php if ($error_firstname) { ?>
				<div class="text-danger"><?php echo $error_firstname; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-lastname"><?php echo $entry_lastname; ?></label>
				<div class="col-sm-10"><input type="text" name="lastname" placeholder="<?php echo $entry_lastname; ?>" id="input-lastname"  value="<?php echo $lastname; ?>" class="form-control" />
				<?php if ($error_lastname) { ?>
				<div class="text-danger"><?php echo $error_lastname; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
				<div class="col-sm-10"><input type="text" name="email" placeholder="<?php echo $entry_email; ?>" id="input-email"  value="<?php echo $email; ?>" class="form-control" />
				<?php if ($error_email) { ?>
				<div class="text-danger"><?php echo $error_email; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-password"><?php echo $entry_password; ?></label>
				<div class="col-sm-10"><input type="text" name="password" placeholder="<?php echo $entry_password; ?>" id="input-password"  value="<?php echo $password; ?>" class="form-control" />
				<?php if ($error_password) { ?>
				<div class="text-danger"><?php echo $error_password; ?></div>
				<?php } ?></div>
			 </div>

<div class="form-group required">
				<label class="col-sm-2 control-label" for="input-mobile"><?php echo $entry_mobile; ?></label>
				 <div class="col-sm-10"><input type="text"  placeholder="<?php echo $entry_mobile; ?>" id="input-mobile" name="mobile" value="<?php echo $mobile; ?>" class="form-control"/>
				<?php if ($error_mobile) { ?>
			<div class="text-danger"><?php echo $error_mobile; ?></div>
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

<?php echo $footer; ?>