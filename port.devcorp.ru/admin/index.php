<?php include("include/connection.php");
if($_SESSION['name']!= null){
header("Location: show_portfolio.php");
}
?> 
<!DOCTYPE html>
<html>
  <head>
    <title>Admin login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <?php
if(isset($_POST['login']))
{
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
		
			$select= mysql_query("SELECT * FROM `users`");
			while($row= mysql_fetch_array($select))
			{
				$id = $row['id'];
				$pass =$row['user_pass'];
				$name =$row['user_name'];
				
				
				
			if ($pass == $password && $username == $name)
			{
				
				
				
				$_SESSION['id']= $id;
				$_SESSION['name']= $name;
				
				
				echo "<script>
setTimeout(function(){
  window.location = 'show_portfolio.php';
}, 0);
</script>";	


				
			}
			
			else if($password == '' || $username == '' )
			{
			echo'
				<script>
				$(document).ready(function() {
				$(".forgot-password-link").html("Please enter the username and password");
				
setTimeout(function(){
  window.location = "index.php";
}, 2000);
	
				});
				</script>';
			}
			else
			{
				echo'
				<script>
				$(document).ready(function() {
				$(".forgot-password-link").html("&nbsp; Sorry the Username and password not correct");
				
setTimeout(function(){
  window.location = "index.php";
}, 2000);
	
				});
				</script>
				';
		
				
			}
			
			}
		
}
?>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">Admin Login</h2>
        <input type="text" class="input-block-level" name="username" placeholder="Email address">
        <input type="password" class="input-block-level" name="password" placeholder="Password">
        <label class="forgot-password-link">
          
        </label>
        <button class="btn btn-large btn-primary" name="login" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>