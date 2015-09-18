<div class="box box-normal border filter">
  <div class="box-heading"><span><?php echo $heading_title; ?></span></div>
  <div class="box-content">
    <ul class="box-filter clearfix">
      
      <?php foreach ($filter_groups as $filter_group) { ?> 
      <li>        
        <span id="filter-group<?php echo $filter_group['filter_group_id']; ?>"><?php echo $filter_group['name']; ?></span>
        <ul>
            <?php foreach ($filter_group['filter'] as $filter) { ?>
            <?php if (in_array($filter['filter_id'], $filter_category)) { ?>
            <li>
              <input id="filter<?php echo $filter['filter_id']; ?>" name="filter[]" type="checkbox" value="<?php echo $filter['filter_id']; ?>" checked="checked" />
              <label for="filter<?php echo $filter['filter_id']; ?>"><?php echo $filter['name']; ?></label>
            </li>
            <?php } else { ?>
            <li>
              <input id="filter<?php echo $filter['filter_id']; ?>" name="filter[]" type="checkbox" value="<?php echo $filter['filter_id']; ?>" />
              <label for="filter<?php echo $filter['filter_id']; ?>"><?php echo $filter['name']; ?></label>
            </li>
            <?php } ?>
            <?php } ?>          
        </ul>  
      </li>     
      <?php } ?>
         
    </ul>
    <button type="button" id="button-filter" class="button btn btn-danger"><?php echo $button_filter; ?></button>
  </div>
  
</div>
<script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	filter = [];
	
	$('input[name^=\'filter\']:checked').each(function(element) {
		filter.push(this.value);
	});
	
	location = '<?php echo $action; ?>&filter=' + filter.join(',');
});
//--></script> 
