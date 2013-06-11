<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("time/add") . '">'; ?>
      <legend>Add new time task</legend>
      <div class="control-group">
        <input type="hidden" id="project_id" name="project_id" <?php if(isset($project_id) && !empty($project_id)){ echo 'value="'.$project_id.'"'; } ?> >
        <label class="control-label" for="inputMessage">Message</label>
        <div class="controls">
            <input type="text" id="inputMessage" name="message" placeholder="Name" 
                <?php if(isset($time) && !empty($time)){ echo 'value="'.$time->message.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="story">Task</label>
        <div class="controls">
            <?php if(isset($tasks) && !empty($tasks)){
                $this->load->helper('form');
                echo form_dropdown('task', $tasks); 
            } ?>   
        </div>
    </div>   
    <div class="control-group">
        <label class="control-label" for="inputMinutes">Time</label>
        <div class="controls">
             <input class="input-medium" type="number" id="inputMinutes" min="10" max="500" step="10" name="minutes"
            <?php if(isset($time) && !empty($time)){ echo 'value="'.$time->minutes.'"'; } ?>   required>
            <span class="help-inline">Minutes</span>
        </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="inputDate">Date</label>
        <div class="controls">
             <input type="date" id="inputDate" min="2012-01-01" max="2014-01-01" name="date"
            <?php if(isset($time) && !empty($time)){ echo 'value="'.$time->date.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDescription">Description</label>
        <div class="controls">
                <textarea rows="4" cols="50" id="inputDescription" name="description">Type your description
                </textarea>
        </div>
    </div>  
   <div class="control-group">
        <div class="controls">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn">Cancel</button>
        </div>
    </div>
</form>

<?php
    if (isset($time->error->string) && (!empty($time->error->string))) {
        ?>
        <div class="alert alert-error">
            <?php echo $time->error->string; ?>
        </div>
        <?php
    }
?>