<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("tasks/edit") . '">'; ?>
      <legend>Edit a task</legend>      
      <div class="control-group">
        <input type="hidden" id="story_id" name="story_id" <?php if(isset($task) && !empty($task)){ echo 'value="'.$task->user_story->id.'"'; } ?> >
        <input type="hidden" id="id" name="id" <?php if(isset($task) && !empty($task)){ echo 'value="'.$task->id.'"'; } ?> >        
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input type="text" id="inputName" name="name" placeholder="Name" 
                <?php if(isset($task) && !empty($task)){ echo 'value="'.$task->name.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputResponsible">Responsible User</label>
        <div class="controls">
            <?php if(isset($responsibles) && !empty($responsibles)){
                $this->load->helper('form');
                echo form_dropdown('responsible', $responsibles); 
            } ?>   

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputState">State</label>
        <div class="controls">
            <?php 
                $this->load->helper('form');
                echo form_dropdown('state', array('running'=>'Running','init'=>'Init','finish'=>'Finish','pause'=>'Pause',$task->state));
            ?>
        </div>
    </div>   
    <div class="control-group">
        <label class="control-label" for="inputEstimate">Estimate</label>
        <div class="controls">
             <input type="number" id="inputEstimate" min="1" max="1000" name="estimate"
            <?php if(isset($task) && !empty($task)){ echo 'value="'.$task->estimate.'"'; } ?>   required>
        </div>
    </div> 


    <div class="control-group">
        <label class="control-label" for="Members">Members</label>
        <div class="controls">
            <?php

                 if(isset($responsibles) && !empty($responsibles)){
                        $newLine = 1;
                        foreach ($responsibles as $id => $name) {
                            //If $name is in relation user "foreach(project->user)"
                            echo '<label for="'.$id.'" class="checkbox inline">';
                            $cheked = in_array($id, $members_relation);
                            $data = array(
                                    'name'        => 'responsibles[]',
                                    'id'          => $id,
                                    'value'       => $id,
                                    'checked'     => $cheked,
                                    );
                            echo form_checkbox($data);
                            echo $name;
                            echo '</label>';
                            if($newLine % 2 == 0){
                                echo '<br>';
                            }
                            $newLine++;
                        }
                    }else{
                        $newLine = 1;
                        foreach ($responsibles as $id => $name) {
                            //If $name is in relation user "foreach(project->user)"
                            echo '<label for="'.$id.'" class="checkbox inline">';
                            $data = array(
                                    'name'        => 'responsibles[]',
                                    'id'          => $id,
                                    'value'       => $id,
                                    'checked'     => FALSE,
                                    );
                            echo form_checkbox($data);
                            echo $name;
                            echo '</label>';
                            if($newLine % 2 == 0){
                                echo '<br>';
                            }
                            $newLine++;
                        }                        
                    }
        ?>
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
    if (isset($task->error->string) && (!empty($task->error->string))) {
        ?>
        <div class="alert alert-error">
            <?php echo $task->error->string; ?>
        </div>
        <?php
    }
?>