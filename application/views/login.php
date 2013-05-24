<?php //$this->load->helper('url'); ?>

<form  id="login" class="form-horizontal" method="post" <?php echo 'action="' . site_url("login"). '">'; ?>
  

  <legend>Sign in</legend>
  <div class="control-group">
  		<input class="input-block-level" type="text" class="input-small" placeholder="Name" name="name">
  </div>
  <div class="control-group">
  		<input class="input-block-level" type="password" class="input-small" placeholder="Password" name="password">
  </div>
  <div class="control-group">
  		<!-- <label class="checkbox">
    		<input type="checkbox" name="remeber"> Remember me
  		</label> -->
  		<button class="btn btn-primary btn-block" type="submit" class="btn">Sign in</button>
  </div>  		
</form>

<?php
if (isset($user->errors->string) && (!empty($user->errors->string))) {
    ?>
    <div class="alert alert-error info_alert">
        <?php echo $user->errors->string; ?>
    </div>
    <?php
}
?>