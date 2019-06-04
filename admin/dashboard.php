<?php

include_once('../server/connection.php');

?>

<html>

  <head>
    <title>Springboard by OppGenetix</title>
    <link rel="stylesheet" href="../styles/master.css" />
  </head>

  <body>
    <?php include('../components/header.php'); ?>

    <div class="container">
      <a href="index.php" class="w-50-l w-80 logo" id="logo"></a>
    </div>


    <nav>
      <ul>
        <li><a href="pages/edit_template.php">Edit Template</a></li>
      </ul>
    </nav>


    <?php include('../components/footer.php'); ?>
  </body>

</html>
