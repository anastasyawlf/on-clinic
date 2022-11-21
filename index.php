<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>On-Clinic</title>
  <link href="style.css" rel="stylesheet" />
</head>
<?php
if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>

<body class=" loginscroll background formbody">
  <div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <div class="loginform">
    <form action="cek_level.php" method="post">
      <h3 class="formh3">Login</h3>
      <div>
        <label class="loginlabel">Username</label>
        <input class="logininput" type="text" name="username" placeholder="Username">
      </div>
      <div>
        <label class="loginlabel">Password</label>
        <input class="logininput" type="password" name="password" placeholder="Password">
      </div>
      <div>
        <button class="loginbutton" type="submit">Log In</button>
      </div>
    </form>
  </div>
</body>

</html>