
<table class="table table-condensed">
    <table class="table table-condensed">
        <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th>Active</th>
        <th>Role</th>
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
                </tr>
                
                <?php
            }// End foreach
            ?>


        </tbody>
    </table>
