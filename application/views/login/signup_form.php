<br>
<h2>SignUp Form</h2>
<hr>
<form class="" action="#" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
    <small class="form-text text-muted"><?php echo "<span style='color:red; display='inline'>".form_error('username')."</span>" ?></small>
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">
    <small class="form-text text-muted"><?php echo "<span style='color:red'>".form_error('password')."</span>" ?></small>
  </div>
  <div class="form-group">
    <label for="confpassword">Confirm password</label>
    <input type="password" class="form-control" id="confpassword" name="confpassword" value="<?php echo set_value('confpassword'); ?>">
    <small class="form-text text-muted"><?php echo "<span style='color:red'>".form_error('confpassword')."</span>" ?></small>
  </div>
  <input type="submit" class="btn btn-primary btn-block" name="" value="Sign Up">
</form>

