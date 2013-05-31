<table class="table table-hover">
    <thead>
    <th>Message</th>
    <th>Description</th>
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
                <td><?php echo $time->minutes; ?></td>
                <td><?php echo $time->date; ?></td>
                <td>
                    <a href='<?php echo site_url("time/edit").'/'.$time->id;  ?>'>Edit</a>
                    <a href='<?php echo site_url("time/delete").'/'.$time->id;  ?>'>Delete</a>
                </td>
            </tr>
            <?php
        }// End foreach
        ?>
    </tbody>
</table>