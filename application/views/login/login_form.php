

<h2>Login Form</h2>
<?php
if (isset($_SESSION['error_message'])) {
echo $_SESSION['error_message'];
}

?>
<form class="" action="<?php echo site_url('login/login') ?>" method="post">
  <label for="username">Username</label><br>
  <input type="text" id="username" name="username" value="" required><br>

  <label for="password">Password</label><br>
  <input type="password" id="password" name="password" value="" required><br>
  <br>
  <input type="submit" name="" value="Login">
</form>
