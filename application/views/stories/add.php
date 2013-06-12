<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("user_stories/add") . '">'; ?>
      <legend>Add a new story</legend>
      <div class="control-group">
        <input type="hidden" id="id" name="id" <?php if(isset($project) && !empty($project)){ echo 'value="'.$project->id.'"'; } ?> >
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input type="text" id="inputName" name="name" placeholder="Name" 
                <?php if(isset($story) && !empty($story)){ echo 'value="'.$story->name.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDescription">Description</label>
        <div class="controls">
            <input type="text" id="inputDescription" name="description" placeholder="description"
            <?php if(isset($story) && !empty($story)){ echo 'value="'.$story->description.'"'; } ?>   required>
            
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPriority">Priority</label>
        <div class="controls">
             <input type="number" id="inputPriority" min="1" max="500" name="priority"
            <?php if(isset($story) && !empty($story)){ echo 'value="'.$story->priority.'"'; } ?>   required>
        </div>
    </div>   
    <div class="control-group">
        <label class="control-label" for="inputEstimate">Estimate</label>
        <div class="controls">
             <input type="number" id="inputEstimate" min="1" max="1000" name="estimate"
            <?php if(isset($story) && !empty($story)){ echo 'value="'.$story->estimate.'"'; } ?>   required>
        </div>
    </div>     
    <div class="control-group">
        <label class="control-label" for="inputValue">Value</label>
        <div class="controls">
             <input type="number" id="inputValue" min="1" max="1000" name="value"
            <?php if(isset($story) && !empty($story)){ echo 'value="'.$story->value.'"'; } ?>   required>
        </div>
    </div>     
   
       <div class="control-group">
            <div class="controls">
            <button type="submit" class="btn btn-primary">Save changes</button>
                    <!-- <button type="button" class="btn">Cancel</button> -->
        </div></div>
</form>

<?php
if (isset($story->error->string) && (!empty($story->error->string))) {
    ?>
    <div class="alert alert-error">
        <?php echo $story->error->string; ?>
    </div>
    <?php
}
?>
