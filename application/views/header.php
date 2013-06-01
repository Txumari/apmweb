<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $page_title ?></title>

		<link type="text/css" rel="stylesheet" href="<?php echo str_replace('index.php/', '', site_url('css/bootstrap.css')); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo str_replace('index.php/', '', site_url('css/bootstrap-responsive.css')); ?>"/>

		<link type="text/css" rel="stylesheet" href="<?php echo str_replace('index.php/', '', site_url('css/aplication.css')); ?>"/>
    </head>
    <body>
    	<script src="http://code.jquery.com/jquery.js"></script>
    	<script src="<?php echo str_replace('index.php/', '', site_url('js/bootstrap.min.js')); ?>"></script>

        <header>
        		<?php
        			if(!isset($hide_menu) || $hide_menu == false){
        				$this->load->view('nav');
        			}
        		?>
				

        </header>

        <?php
        if (!isset($message)) {

            $message = $this->session->flashdata('message');
            if (!empty($message)) {
                ?>
                <section>
                    <div id="page_message" class="alert alert-info info_alert"><?php echo htmlspecialchars($message); ?></div>
                </section>
            <?php
            }
        }
		if (!isset($message_error)) {
            $message_error = $this->session->flashdata('message_error');
            if (!empty($message_error)) {
                ?>
                <section>
                    <div id="page_message" class="alert alert-error"><?php echo htmlspecialchars($message_error); ?></div>
                </section>
            <?php
            }
        }
        if(!isset($hide_menu) || $hide_menu == false){
            if(!isset($menu_tabs)){ $menu_tabs = FALSE; } 
            if($menu_tabs){
        ?>

	   		<div class="container" id="main">
	   			<ul class="nav nav-tabs">
				  <li class="active">
					 <a class="" href="edit" >Create New</a>
				  </li>
				  <li>
					  <a class="" href="lists">List All</a>
				  </li>
				  <li>
					  <a class="" >List Paged</a>
				  </li>
				</ul>
		<?php
            }else{
                echo '<div class="container" id="main">';
            }

		}else{

			echo '<div class="container">';
		}
       	?>


            