<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="view/image/btn-popup-close.png"></button>
      <h4 class="modal-title"><?php echo $heading_title; ?></h4>
    </div>
    <div class="modal-body">
    	<iframe frameborder="no" height="500" width="100%" src="<?php echo HTTP_SERVER; ?>view/javascript/filemanager/dialog.php?type=0&fldr=<?php echo DIR_IMAGE; ?>&thumb=<?php echo $thumb; ?>&target=<?php echo $target; ?>&server=<?php echo urlencode(HTTP_CATALOG); ?>"></iframe>
    </div>
    <div class="modal-footer"><?php echo $pagination; ?></div>
  </div>
</div>