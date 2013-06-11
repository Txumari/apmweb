<form method="POST" class="form-horizontal"  <?php echo 'action="' . site_url("projects/add") . '">'; ?>
    <legend>Add new project</legend>      
      <div class="control-group">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
            <input type="text" id="inputName" name="name" placeholder="Name" 
                <?php if(isset($dataView['project']) && !empty($dataView['project'])){ echo 'value="'.$dataView['project']->name.'"'; } ?>   required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDescription">Description</label>
        <div class="controls">
            <input type="text" id="inputDescription" name="description" placeholder="description"
            <?php if(isset($dataView['project']) && !empty($dataView['project'])){ echo 'value="'.$dataView['project']->description.'"'; } ?>   required>
            
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputClient">Client</label>
        <div class="controls">
            <?php 
                    $this->load->helper('form');
                    echo form_dropdown('client', $dataView['clients']); 
            ?>
        </div>
    </div>   
    <div class="control-group">
        <label class="control-label" for="input_scrum_master">Scrum Master</label>
        <div class="controls">
            <?php 
                    if(isset($dataView['scrum_masters'])){
                        echo form_dropdown('scrum_master', $dataView['scrum_masters']);
                    }else{
                        echo form_dropdown('scrum_master',['No exists users']);
                    }
            ?>
        </div>
    </div>     
   
       <div class="control-group">
            <div class="controls">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn">Cancel</button>
        </div></div>
</form>

<?php
if (isset($dataView['project']->error->string) && (!empty($dataView['project']->error->string))) {
    ?>
    <div class="alert alert-error">
        <?php echo $dataView['project']->error->string; ?>
    </div>
    <?php
}
?>
