<?php if ($this->session->has_userdata('message_true') == TRUE) : ?>
  <div id="notice" class="alert alert-success">
    <button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
    <div id="pesan"></div>
  </div>
<?php endif; ?>

<?php if ($this->session->has_userdata('message_false') == TRUE) : ?>
  <div id="notice" class="alert alert-danger">
    <button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
    <div id="pesan"></div>
  </div>
<?php endif; ?>