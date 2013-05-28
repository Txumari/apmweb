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
                </td>
            </tr>
            
            <?php
        }// End foreach
        ?>


    </tbody>
</table>
