<br>
<!-- Edit Username dropdown -->
<h4>Username</h4>
<hr>
<p><small>Click the bellow button to change your username</small></p>
<div class="dropdown">
  <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseUsername" aria-expanded="false" aria-controls="collapseUsername">
  Edit Username</button>
 
  <form class="card card-body collapse" id="collapseUsername">
    <div class="form-group">
      <label for="current_name">Current Username</label>
      <input disabled type="text" class="form-control" id="current_name" placeholder="<?php echo $_SESSION['username']; ?>">
    </div>
    <div class="form-group">
      <label for="username">New Username</label>
      <input type="text" class="form-control" id="username">
      <small id="username_error" class="form-text text-muted"></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<br><br><br>


<!-- Edit Password dropdown -->
<div class="dropdown">
  <h4>Password</h4>
  <hr>
  <p><small>Click the bellowe button to change your password</small></p>
  <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword">
Edit Password</button>
<form class="card card-body collapse" id="collapsePassword">
    <input hidden disabled type="text" id="pass" value="<?php echo $_SESSION['password']; ?>">
    <div class="form-group">
      <label for="current_password">Current Password</label>
      <input type="password" class="form-control" id="current_password" placeholder="Enter old password here ...">
      <small id="current_error" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="new_password">New Password</label>
      <input type="password" class="form-control" id="new_password">
      <small id="new_error" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="conf_new_password">Confirm New Username</label>
      <input type="password" class="form-control" id="conf_new_password">
      <small id="conf_new_error" class="form-text text-muted"></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


</div>


<br><br><br>

<!-- Delete account dropdown -->
<div class="dropdown">
<h4 style="color: red;">Delete account</h4>
<hr>
<p><small>Click the button below to delete your account</small></p>
<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseDelete" aria-expanded="false" aria-controls="collapseDelete">
 Delete account</button>
 <form class="card card-body collapse" id="collapseDelete">
  <div class="form-group">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus iusto ea dolorum delectus sunt nesciunt voluptas quibusdam harum facilis minus maxime laudantium, perspiciatis officia doloremque dolore quo quisquam fugiat aliquam!
    check
  </div>
  <div class='form-check'>
    <input type="checkbox" class="form-check-input" id="checkbox">
    <label class="form-check-label" for="checkbox">I understand the consequences of deleting my account</label>
 </div>
  
  <button type="submit" class="btn btn-danger">Delete Account</button>
 <form>
 <small id="#delete_error">something small here</small>
</div>

<br><br><br>

<script>
// Handling the username edit
$('#collapseUsername').submit(function(e){
  e.preventDefault();
  
  var username = $('#username').val();
  
  $.ajax({
    type: 'post',
    url: "<?php echo site_url('myaccount/update_username'); ?>",
    data: {username : username},
    dataType: 'json',
    success: function(response){
      console.log(response);
      $('#username_error').html(response.error);
      if(response.redirect){
        window.location.href = response.redirect;
      }
    }
  });

});

// Handling password edit
$('#collapsePassword').submit(function(e){
  e.preventDefault();

  var pass = $('#pass').val();
  var current_pass = $('#current_password').val();
  var new_pass = $('#new_password').val();
  var conf_new_pass = $('#conf_new_password').val();

  $.ajax({
    type: 'post',
    url: "<?php echo site_url('myaccount/update_password'); ?>",
    data: {
      pass : pass,
      current_pass : current_pass,
      new_pass : new_pass,
      conf_new_pass : conf_new_pass
    },
    dataType: 'json',
    success: function(response){
      console.log(response);

      if(response.current_error){
        $('#current_error').html(response.current_error);
      } else{ $('#current_error').html(""); }

      if(response.new_error){
        $('#new_error').html(response.new_error);
      }else{ $('#new_error').html(""); }

      if(response.conf_new_error){
        $('#conf_new_error').html(response.conf_new_error);
      }else{ $('#conf_new_error').html(""); }

      if(response.redirect){
        window.location.href = response.redirect;
      }
    }
  });
});

// Handling of account delete
$('#collapseDelete').submit(function(e){
    e.preventDefault();
    var checked = $('#checkbox').prop('checked');

    if(!checked){
      alert("You must check the box to confirm account deletion!")
    }else{
      $.ajax({
        type: 'post',
        url: "<?php echo site_url('myaccount/delete_account') ?>",
        data: {},
        dataType: 'json',
        success: function(response){
          if(response.redirect){
            window.location.href = response.redirect;
          }
        }
      });
    }


  });
</script>









