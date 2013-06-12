<?php //$this->load->helper('url');
?>

<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("account/add_user") . '">'; ?>
      
    <legend>Add new user</legend>
      <div class="control-group">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input type="text" id="inputName" name="name" placeholder="Name" 
                <?php if(isset($user) && !empty($user)){ echo 'value="'.$user->name.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
            <input type="password" id="inputPassword" name="password" placeholder="Password" required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRepeatPassword">Repeat Password</label>
        <div class="controls">
            <input type="password" id="inputRepeatPassword" name="confirm_password" placeholder="Password" required>
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
                echo form_dropdown('role', array('member'=>'member','client'=>'product owner ','scrum master'=>'scrum master','admin'=>'admin'), $user->rol);

            }?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Save changes</button>
                    <!-- <button type="button" class="btn">Cancel</button> -->
        </div>
    </div>
</form>

<?php
if (isset($dataView['project']->error->string) && (!empty($dataView['project']->error->string))) {
    ?>
    <div class="alert alert-error">
        <?php echo $user->error->string; ?>
    </div>
    <?php
}
?>
