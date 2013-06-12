<table class="table table-hover">
    <thead>
    <th>Message</th>
    <th>Description</th>
    <th>Task</th>
    <th>Time</th>
    <th>Date</th>
    <th></th>
    </thead>
    <tbody>
        <?php
        foreach ($times as $time) {
            ?>
            <tr>
                <td><?php echo $time->message; ?></td>
                <td><?php echo $time->description; ?></td>
                <td><?php echo $time->task->name; ?></td>
                <td><?php echo $time->minutes; ?></td>
                <td><?php echo $time->date; ?></td>
                <td>
                    <a title="edit" class="btn btn-small disabled " href='<?php echo site_url("time/edit").'/'.$time->id;  ?>'><i class="icon-edit"></i></a>
                    <a title="delete" class="btn btn-small disabled " href='<?php echo site_url("time/delete").'/'.$time->id;  ?>'><i class="icon-trash"></i></a>
                </td>
            </tr>
            <?php
        }// End foreach
        ?>
    </tbody>
</table>