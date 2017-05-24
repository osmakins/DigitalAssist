<?php
	include('header.php');
?>
	 <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Digital Assistant</h1>
        <p>This is an online digital assistant where you can make requests via the help link. First you have to click the button below to register.
		<p><a href="registration.php"><button type="button" class="btn btn-lg btn-info">Register Here!</button></a></p>
		</p>
      </div>
		<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Welcome!</h3>
            </div>
            <div class="panel-body">
              <?php
		require('db.php');
		session_start();
		// If form submitted, insert values into the database.
		if (isset($_POST['username'])){
				// removes backslashes
			$username = stripslashes($_REQUEST['username']);
				// escapes special characters in a string
			$username = mysqli_real_escape_string($con,$username);
			$password = stripslashes($_REQUEST['password']);
				// Checking is user existing in the database or not
			$password = mysqli_real_escape_string($con,$password);
				$query = "SELECT * FROM `users` WHERE username='$username'
		and password='".md5($password)."'";
			$result = mysqli_query($con,$query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
				if($rows==1){
				$_SESSION['username'] = $username;
					// Redirect user to index.php
				header("Location: welcome.php");
				 }else{
			echo "<div class='form'>
		<h3>Username/password is incorrect.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
			}
			}else{
		?>
		<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to Digi-Assist</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="/login/" >
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="Username" required>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password" required>
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <button type="reset" class="btn btn-default btn-block">Reset</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register here now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Ask help/Send requests</li>
                          <li><span class="fa fa-check text-success"></span> Create/edit your profile</li>
                          <li><span class="fa fa-check text-success"></span> See all your request</li>
                          <li><span class="fa fa-check text-success"></span> Get your business quick progress</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <li><a href="/read-more/"><u>Read more</u></a></li>
                      </ul>
                      <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
	<?php } ?>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
		
 <?php
	include('footer.php');
 ?>