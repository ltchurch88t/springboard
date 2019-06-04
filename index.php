<?php

include_once('server/connection.php');
include_once('components/content.php');

$content = new Content;
$print_content = $content->fetch_all('OppGenetix');


?>
<html>

  <head>
    <title>Springboard by OppGenetix</title>
    <link rel="stylesheet" href="styles/master.css" />
  </head>

  <body>
    <?php include('components/header.php'); ?>

    <div class="container">
      <a href="index.php" class="w-50-l w-80 logo" id="logo"></a>
    </div>

      <div class="">
        <?php echo $print_content[0][1]; ?>
      </div>
      <div class="">
        <?php echo $print_content[0][2]; ?>
      </div>
      <div class="">
        <?php echo $print_content[0][3]; ?>
      </div>
      <div class="">
        <?php echo $print_content[0][4]; ?>
      </div>
      <div class="">
        <?php echo $print_content[0][5]; ?>
      </div>
      <div class="">
        <?php echo $print_content[0][6]; ?>
      </div>

    <?php include('components/footer.php'); ?>
  </body>

</html>
