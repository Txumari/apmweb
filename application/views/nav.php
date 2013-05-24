<?php
	$sections = array(
		'home' => array(
			'name' => 'Home',
			'url' => 'projects/lists',
 			'restrict' => ['']
		),
		'projects' => array(
			'name' => 'Projects',
			'url' => 'projects/lists',
			'restrict' => ['']
		),
		'account' => array(
			'name' => 'Users',
			'url' => 'account/lists',
			'restrict' => ['']
		),
		'logout' => array(
			'name' => 'Logout',
			'url' => 'logout',
			'restrict' => ['']
		)
	);
?>


<div class="container" id="menuContainer">
	<nav>
	  <div class="navbar">
		  <div class="navbar-inner">
		    <ul class="nav">
		    <?php 
		    	$user = isset($this->login_manager) ? $this->login_manager->get_user() : FALSE;

			    foreach($sections as $key => $section){
					if($user !== FALSE){
			    		 
			    		 if(isset($section['restrict'])){
			    		 	if(!in_array($user->rol, $section['restrict'])){
								echo '<li><a href="'. site_url($section['url']). '">'. $section['name']."</a></li>";

			    		 	}
			    		 }
			    	}
			    }
		    ?>
		    </ul>
		  </div>
		</div>
	</nav>



<!-- 	<div class="btn-group">
	  <a class="btn" href="edit" >Create New</a>
	  <a class="btn" href="lists">List All</a>
	  <a class="btn disabled" >List Paged</a>
	</div>
</div> -->
