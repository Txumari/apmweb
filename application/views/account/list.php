


<table class="table table-  table-hover tableContainer">
    <thead>
    <th>Nombre</th>
    <th>Email</th>
    <th>Active</th>
    <th>Role</th>
    <th>Options</th>
    </thead>
    <tbody>

        <?php
        foreach ($users as $user) {
            ?>

            <tr>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->active; ?></td>
                <td><?php echo $user->rol; ?></td>
                <td><a href='<?php echo site_url("account/edit").'/'.$user->id;  ?>'>Edit</a></td>
            </tr>
            
            <?php
        }// End foreach
        ?>


    </tbody>
</table>
