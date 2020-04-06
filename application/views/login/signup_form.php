<h2>SignUp Form</h2>
<form class="" action="#" method="post">
  <label for="username">Username</label><br>
  <input type="text" id="username" name="username" value="<?#php echo set_value('username'); ?>">
  <?php echo "<span style='color:red'>".form_error('username')."</span>" ?><br>
  <label for="password">Password</label><br>
  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>">
  <?php echo "<span style='color:red'>".form_error('password')."</span>" ?><br>
  <label for="confpassword">Confirm password</label><br>
  <input type="password" id="confpassword" name="confpassword" value="<?php echo set_value('confpassword'); ?>">
  <?php echo "<span style='color:red'>".form_error('confpassword')."</span>" ?><br>
  <br>
  <input type="submit" name="" value="Sign Up">

</form>
