<?php $this->load->helper('url');
?>




<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("account/edit_user") . '">'; ?>
      <div class="control-group">
          <input type="hidden" <?php if(isset($user) && !empty($user)){ echo 'value="'.$user->id.'"'; } ?> name="id">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input type="text" id="inputName" name="name" placeholder="Name" 
                <?php if(isset($user) && !empty($user)){ echo 'value="'.$user->name.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
            <input type="password" id="inputPassword" name="password" placeholder="Password">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRepeatPassword">Repeat Password</label>
        <div class="controls">
            <input type="password" id="inputRepeatPassword" name="confirm_password" placeholder="Password">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
            <input type="email" id="inputEmail" name="email" placeholder="Email@email.com" 
                <?php if(isset($user) && !empty($user)){ echo 'value="'.$user->email.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRepeatEmail">Repeat Email</label>
        <div class="controls">
            <input type="email" id="inputRepeatEmail" name="confirm_email" placeholder="Email@email.com" 
                <?php if(isset($user) && !empty($user)){ echo 'value="'.$user->email.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="selectRole">Role</label>
        <div class="controls">
            
            <?php if(isset($user) && !empty($user)){
                $this->load->helper('form');
                echo form_dropdown('role', array('member'=>'member','client'=>'client','admin'=>'admin'), $user->rol);

            }?>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn">Cancel</button>
    </div>
</form>

<?php
if (isset($user->error)) {
    ?>
    <div class="alert alert-error">
        <?php echo $user->error->string; ?>
    </div>
    <?php
}
?>
