<?php

	$sections = array(
		'home' => array(
			'name' => 'Home',
			'url' => 'welcome',
			'restrict' => ['']
		),
		'projects' => array(
			'name' => 'Projects',
			'url' => 'projects/lists',
			'restrict' => ['']
		),
		'account' => array(
			'name' => 'Users',
			'url' => 'account/user_list',
			'restrict' => ['']
		)
	);

?>
			<nav>
			  <ul class="nav nav-tabs">
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
			</nav>


