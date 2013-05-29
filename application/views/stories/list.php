<table class="table table-hover">
    <thead>
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
        }// End foreach
        echo '<a href="'. site_url("user_stories/add").'/'.$project_id. '">Add new Story</a>'
        ?>
    </tbody>
</table>
