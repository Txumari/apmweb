<table class="table table-hover">
    <thead>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
    <th>Project</th>
    <th>Priority</th>
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
                        <button class="btn btn-info " type="button" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href=".collapse<?php echo $story->id; ?>">+</button>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $story->name; ?></td>
                  <td><?php echo $story->description; ?></td>
                  <td><?php echo '<a href="#" >' . $story->project->name . '</a>'; ?></td>
                  <td><?php echo $story->priority; ?></td>
                  <td><?php echo $story->value; ?></td>
                  <td>
                      <a href='<?php echo site_url("user_stories/edit").'/'.$story->id;  ?>'>Edit</a>
                      <a href='<?php echo site_url("user_stories/delete").'/'.$story->id;  ?>'>Delete</a>
                  </td>
              </tr>

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
                      <?php echo $task->user_story->name; ?>
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
                <td colspan="2">
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
              </tr>                            
                      <?php                            
                          }
                      ?>


            <?php
        }// End foreach
        echo '<a href="'. site_url("user_stories/add").'/'.$project_id. '">Add new Story</a>'
        ?>

    </tbody>
</table>

