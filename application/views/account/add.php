<?php $this->load->helper('url'); ?>

<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("account/add_user") . '">'; ?>
      <div class="control-group">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input type="text" id="inputName" name="name" placeholder="Name" required>
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
            <input type="email" id="inputEmail" name="email" placeholder="Email@email.com" required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputRepeatEmail">Repeat Email</label>
        <div class="controls">
            <input type="email" id="inputRepeatEmail" name="repeatEmail" placeholder="Email@email.com" required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="selectRole">Role</label>
        <div class="controls">
            <select id="selectRole" name="role" required>
                <option value="member">Member</option>
                <option value="client">Client</option>
                <option value="admin">Admin</option>
            </select>
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
