<?php //$this->load->helper('url'); ?>

<form class="form-inline" method="post" <?php echo 'action="' . site_url("login"). '">'; ?>
  <input type="text" class="input-small" placeholder="Email" name="name">
  <input type="password" class="input-small" placeholder="Password" name="password">
  <label class="checkbox">
    <input type="checkbox" name="remeber"> Remember me
  </label>
  <button type="submit" class="btn">Sign in</button>
</form>

<?php echo $user->errors->string ?>