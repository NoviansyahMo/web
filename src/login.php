<?php session_start();

if (isset($_POST['Submit'])) {
  $logins = array('admin' => 'admin', 'user' => 'user');

  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  if (isset($logins[$Username]) && $logins[$Username] == $Password) {
    $_SESSION['UserData']['Username'] = $logins[$Username];
    header("location:index.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login | Quiz Web</title>
  <link rel="stylesheet" href="styles/login.css">
</head>

<body>
  <form action="" method="post">
    <h3>Login</h3>
    <input name="Username" placeholder="Username" type="text">
    <input name="Password" placeholder="Password" type="password">
    <input name="Submit" type="submit" value="Login">
  </form>
</body>

</html>