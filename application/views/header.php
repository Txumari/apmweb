<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php $page_title ?></title>

    </head>
    <body>
        <header>

        </header>


        <?php
        if (!isset($message)) {
            $message = $this->session->flashdata('message');
            if (!empty($message)) {
                ?>
                <section>
                    <div id="page_message" class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
                </section>
            <?php
            }
        }
        ?>
            