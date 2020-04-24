<br>
<h2>Login Form</h2>
<hr>
<p><?php
if (isset($_SESSION['error_message'])) {
echo $_SESSION['error_message'];
}

?></p>
<form class="" action="<?php echo site_url('login/login') ?>" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="" required> 
  </div>
  <div class="form-group">
  <input type="submit" class="btn btn-primary btn-block" name="" value="Login">
  </div>
</form>
