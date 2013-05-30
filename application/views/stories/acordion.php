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
                    <div class="accordion-group">
                      <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">#</a>
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
              <tr  id="demo" class="collapse in" >
                <td colspan="7">
                  <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        Hola-----
                    </div>
                  </div>
                </td>
              </tr>

            <?php
        }// End foreach
        echo '<a href="'. site_url("user_stories/add").'/'.$project_id. '">Add new Story</a>'
        ?>

    </tbody>
</table>

