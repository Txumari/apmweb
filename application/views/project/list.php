<table class="table table-hover   ">
    <thead>
    <th>Name</th>
    <th>Description</th>
    <th>Client</th>
    <th>Scrum Master</th>
    <th>Members</th>
    <th>Options</th>
    </thead>
    <tbody>

        <?php
        foreach ($projects as $project) {
            ?>

            <tr>
               
                <td><?php echo $project->name; ?></td>
                <td><?php echo $project->description; ?></td>
                <td><?php echo $project->client->name; ?></td>
                <td><?php echo $project->scrum_master->name; ?></td>
                <td><?php echo '<ul>';
                        foreach ($project->user as $u) {
                            echo '<li>'.$u->name.'</li>';
                        }
                        echo '</ul>'
                        
                    ?>
                </td>
                <td>

                    <div class="btn-toolbar">
                      <div class="btn-group">
                        <a title="edit" class="btn" href="<?php echo site_url("projects/edit").'/'.$project->id;  ?>"><i class="icon-edit"></i></a>
                        <a title="delete" class="btn" href="<?php echo site_url("projects/delete").'/'.$project->id;  ?>"><i class="icon-trash"></i></a>
                        <a title="details" class="btn" href="<?php echo site_url("projects/backlog").'/'.$project->id;  ?>"><i class="icon-eye-open"></i></a>
                        
                  
                    <?php 
                            $this->load->library('login_manager');
                            if($this->login_manager->has_roles(["member","scrum master"])){
                                echo '<a title="add time" class="btn" href="'.site_url("time/add").'/'.$project->id.'"><i class="icon-time"></i></a>';
                                echo '<a title="view times" class="btn" href="'.site_url("time/listProjectTime/").'/'.$project->name.'"><i class="icon-calendar"></i></a>';
                            }
                    ?>
                    </div>
                    </div>

                </td>
            </tr>
            
            <?php
        }// End foreach
        ?>


    </tbody>
</table>
