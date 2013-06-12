<table class="table table-hover">
    <thead>
    <th></th>
    <th>Name</th>
    <th>Description</th>
    <th>Project</th>
    <th>Priority</th>
    <th>Estimate</th>
    <th>Value</th>
    <th></th>
    </thead>
    <tbody>
        <?php
        foreach ($product_backlog as $story) {
            ?>
              <tr>
                  <td>
                    <div class="">
                      <div class="accordion-heading">
                        <div class="btn-toolbar">
                          <div class="btn-group">
                            <button class="btn btn-info " type="button" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href=".collapse<?php echo $story->id; ?>">+</button>
                            <a class="btn btn-info " type="button" href="<?php echo site_url()."/tasks/add/". $story->id; ?>">New Task</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $story->name; ?></td>
                  <td><?php echo $story->description; ?></td>
                  <td><?php echo '<a href="#" >' . $story->project->name . '</a>'; ?></td>
                  <td><?php echo $story->priority; ?></td>
                  <td><?php echo $story->estimate; ?></td>
                  <td><?php echo $story->value; ?></td>
                  <td>
                    <div class="btn-toolbar">
                      <div class="btn-group">
                        <a title="edit" class="btn" href='<?php echo site_url("user_stories/edit").'/'.$story->id;  ?>'><i class="icon-edit"></i></a>
                        <a title="delete" class="btn" href='<?php echo site_url("user_stories/delete").'/'.$story->id;  ?>'><i class="icon-trash"></i></a>
                      </div>
                    </div>
                  </td>
              </tr>

              <?php
              // if(empty($story->tasks)){
              ?>
              <tr class="info table_head">
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">Name
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">Responsable
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">Story
                    </div>
                  </div>
                </td>
                  <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">Estimate
                    </div>
                  </div>
                </td>
                  <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">State
                    </div>
                  </div>
                </td>
                  <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">Members
                    </div>
                  </div>
                </td>
                  <td colspan="2">
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">
                    </div>
                  </div>
                </td>
              </tr>

              <?php
               // }
              ?>
                      <?php
                          foreach ($story->tasks as $task) { 
                      ?>
              <tr class="info">
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">                      
                            <?php echo $task->name; ?>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner"> 
                      <?php echo $task->responsible->name; ?>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner"> 
                      <?php echo $task->user_story->name; ?>
                      
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner"> 
                      <?php echo $task->estimate; ?>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner"> 
                      <?php echo $task->state; ?>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner">                   
                    <?php 
                        echo '<ul>';
                        foreach ($task->user as $member) {
                            echo '<li>'.$member->name.'</li>';
                        }
                        echo '</ul>'
                    ?>
                    </div>
                  </div>                    
                </td>
                <td colspan="2">
                  <div class="accordion-body collapse<?php echo $story->id; ?> collapse out">
                    <div class="accordion-inner"> 

                          <a title="edit" class="btn btn-small" href='<?php echo site_url("tasks/edit").'/'.$task->id;  ?>'><i class="icon-edit"></i></a>
                          <a title="delete" class="btn btn-small" href='<?php echo site_url("tasks/delete").'/'.$task->id;  ?>'><i class="icon-trash"></i></a>

                    </div>
                  </div>
                </td>                
              </tr>                            
                      <?php                            
                          }
                      ?>
            <?php
        }// End foreach
        ?>
              <tr>
                <td colspan="8">
                  <?php echo '<a class="btn btn-primary " type="button" href="'. site_url("user_stories/add").'/'.$project_id. '">Add new Story</a>' ?>
                </td>
              </tr>

    </tbody>
</table>



