
<table class="table table-condensed">
    <table class="table table-condensed">
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
                    <td><?php 
                            foreach ($project->user as $u) {
                                echo '<li>'.$u->name.'</li>';
                            }
                            
                        ?>
                    </td>
                    <td><a href='<?php echo site_url("account/edit_project").'/'.$project->id;  ?>'>Edit</a></td>
                </tr>
                
                <?php
            }// End foreach
            ?>


        </tbody>
    </table>
