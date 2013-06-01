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
                    <a href='<?php echo site_url("projects/edit").'/'.$project->id;  ?>'>Edit</a>
                    <a href='<?php echo site_url("projects/delete").'/'.$project->id;  ?>'>Delete</a>
                    <a href='<?php echo site_url("projects/backlog").'/'.$project->id;  ?>'>View detailed</a>
                    <?php 
                            $this->load->library('login_manager');
                            if($this->login_manager->has_roles(["member","scrum master"])){
                                echo '<a href="'.site_url("time/add").'/'.$project->id.'">Add Time</a>';
                                echo '<a href="'.site_url("time/listProjectTime/").'/'.$project->name.'">View Times</a>';
                            }
                    ?>

                </td>
            </tr>
            
            <?php
        }// End foreach
        ?>


    </tbody>
</table>
