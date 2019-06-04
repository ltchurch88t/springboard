<?php

include_once('../server/connection.php');

if(isset($_SESSION['logged_in'])) {
  header('Location: dashboard.php');
} else {
  if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) or empty($password)) {
      $error = 'All fields are empty';
    } else {
      $if_user = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

      $if_user->bindValue(1, $username);
      $if_user->bindValue(2, $password);

      $if_user->execute();

      $num = $if_user->rowCount();

      if ($num == 1) {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit();
      } else {
        $error = "Incorrect Details!"; 
      }
    }
  }

}

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

      <?php if (isset($error)) { ?>
      <p class="" style="color: red;"><?php echo $error; ?></p>
      <?php  } ?>

      <form action="index.php" method="post" autocomplete="off">
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Login" />
      </form>
    </div>

    <?php include('../components/footer.php'); ?>
  </body>

</html>
