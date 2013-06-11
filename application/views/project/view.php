<table class="table table-hover   ">
    <thead>
    	<th>Projects Details</th>
    	<th><?php echo $project->name; ?></th>
    </thead>
    <tbody>
    	<tr>
	    	<td>Description</td>
	    	<td><?php echo $project->description; ?></td>
	    </tr>
	    <tr>
	    	<td>Client</td>
	    	<td><?php echo $project->client->name; ?></td>
	    </tr>
	    <tr>
	    	<td>Scrum Master</td>
	    	<td><?php echo $project->scrum_master->name; ?></td>
	    </tr>
	    <tr>
	    	<td>Members</td>
	    	<td><?php echo '<ol>';
                        foreach ($project->user as $u) {
                            echo '<li>'.$u->name.'</li>';
                        }
                        echo '</ol>'
                        
                    ?>
                </td>
	    </tr>    
    <tbody>