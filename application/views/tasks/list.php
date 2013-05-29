<table class="table table-hover">
    <thead>
    <th>Name</th>
    <th>Responsible</th>
    <th>State</th>
    <th>Estimation</th>
    <th>User Story</th>
    <th>Members</th>
    <th></th>
    </thead>
    <tbody>
        <?php
        foreach ($tasks as $task) {
            ?>
            <tr>
                <td><?php echo $task->name; ?></td>
                <td><?php echo $task->responsible->name; ?></td>
                <td><?php echo $task->state; ?></td>
                <td><?php echo $task->estimation; ?></td>
                <td><?php echo $task->user_story->name; ?></td>
                <td><?php echo '<ul>';
                        foreach ($task->user as $u) {
                            echo '<li>'.$u->name.'</li>';
                        }
                        echo '</ul>'
                        
                    ?>
                </td>
                <td>
                    <a href='<?php echo site_url("tasks/edit").'/'.$task->id;  ?>'>Edit</a>
                    <a href='<?php echo site_url("tasks/delete").'/'.$task->id;  ?>'>Delete</a>
                </td>
            </tr>
            <?php
        }// End foreach
        ?>
    </tbody>
</table>