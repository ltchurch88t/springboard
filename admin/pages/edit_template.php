<?php

include_once('../../server/connection.php');
include_once('../../components/content.php');

$content = new Content;
$print_content = $content->fetch_all('OppGenetix');


if (isset($_POST['client_name'], $_POST['client_phone'], $_POST['client_address'], $_POST['main_content'], $_POST['testimonial_content'], $_POST['cta_content'])) {
    $client_name = $_POST['client_name'];
    $client_phone = $_POST['client_phone'];
    $client_address = $_POST['client_address'];
    $main_content = $_POST['main_content'];
    $testimonial_content = $_POST['testimonial_content'];
    $cta_content = $_POST['cta_content'];

    $post_template_data = $conn->prepare("UPDATE OppGenetix SET client_name = ?, client_phone = ?, client_address = ?, main_content = ?, testimonial_content = ?, cta_content = ? WHERE client_id = 0");

    $post_template_data->bindValue(1, $client_name);
    $post_template_data->bindValue(2, $client_phone);
    $post_template_data->bindValue(3, $client_address);
    $post_template_data->bindValue(4, $main_content);
    $post_template_data->bindValue(5, $testimonial_content);
    $post_template_data->bindValue(6, $cta_content);

    try {
      $post_template_data->execute();
      $success = "Database Succesfully Updated";
    } catch (PDOException $e) {
      echo $e;
    }
}

?>

<html>

  <head>
    <title>Edit Template | Springboard by OppGenetix</title>
    <link rel="stylesheet" href="../../styles/master.css" />
  </head>

  <body>
    <?php include('../../components/header.php'); ?>

    <div class="container">
      <a href="../index.php" class="w-50-l w-80 logo" id="logo"></a>
    </div>

      <?php if($success) { ?>
        <p class="">
          <?php echo $success; ?>
        </p>
      <?php } ?>

      <form action="edit_template.php" method="post" autocomplete="off">
        <input type="text" name="client_name" placeholder="<?php echo $print_content[0][1] ?>" />
        <input type="text" name="client_phone" placeholder="<?php echo $print_content[0][2] ?>" />
        <textarea name="client_address" placeholder="<?php echo $print_content[0][3] ?>"></textarea>
        <textarea name="main_content" placeholder="<?php echo $print_content[0][4] ?>"></textarea>
        <textarea name="testimonial_content" placeholder="<?php echo $print_content[0][5] ?>"></textarea>
        <textarea name="cta_content" placeholder="<?php echo $print_content[0][6] ?>"></textarea>
        <input type="submit" value="Edit Template" />
      </form>

    <?php include('../../components/footer.php'); ?>
  </body>

</html>
