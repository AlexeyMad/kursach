<!DOCTYPE html>
<?php include("include/connection.php");
if($_SESSION['name']== null){
header("Location: index.php");
}
$selectusers=mysql_fetch_array(mysql_query("select * from `users`"));
 ?>
<html>
    
    <head>
        <title>Сменить пароль</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
 
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		 <script src="assets/jquery.js"></script>
		
    </head>
    
    <body>
        <?php include("include/header.php"); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include("include/menu.php");?>
                <!--/span-->
                <div class="span9" id="content">

                    
                    

                    <div class="row-fluid">
                        <!-- block -->
						<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Пользователь</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Пользователь</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Имя пользователя </label>
                                          <div class="controls">
                       <input type="text" class="span6" name="username" value="<?php echo $selectusers['user_name']; ?>" id="typeahead" required>
                                            
                                          </div>
                                        </div>
                                        
                                        
                                        
										<div class="control-group">
                                          <label class="control-label" for="typeahead">Пароль</label>
                                          <div class="controls">
       <input type="password" class="span6" name="userpass" value="<?php echo $selectusers['user_pass']; ?>" id="typeahead" required>
                                            
                                          </div>
                                        </div>
										
                                       
                                        
										
                                        <div class="form-actions">
          <button type="submit" style="width:180px;left:50px;position:relative;" class="btn btn-primary" name="submit">Сохранить</button>
                                          
                                        </div>
                                      </fieldset>
                                    </form>
									

                                </div>
                            </div>
                        </div>
                       
                        <!-- /block -->
                    </div>


                   

                   

                    



                </div>
            </div>
            <hr>
			
            </div>
            <footer>
                
            </footer>
        </div>
		
        <!--/.fluid-container-->

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
		 <script src="vendors/jGrowl/jquery.jgrowl.js"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>
	<?php
											if(isset($_POST['submit']))
											{
												
 $selectnumusers=mysql_num_rows(mysql_query("select * from `users`"));
	           
	 $username=$_POST['username']; 
     $userpass=$_POST['userpass'];	 
	 if($selectnumusers == 0)
			   {
	$useredit=mysql_query("insert into `users` values('','$username','$userpass')"); 
}	
else
{
$useredit=mysql_query("update `users` set `user_name`='$username',`user_pass`='$userpass'");
}
if($useredit)
{
echo"
<script>
$(function() {
$.jGrowl('User edit successfully', { header: 'User' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'users.php';
}, 2000);
</script>";	
}
}
												
											
											
											?>
											<?php
if(isset($_POST['submit1']))
{
$username1=$_POST['username1'];
$userpass1=$_POST['userpass1'];
$userid1=$_POST['userid1'];
$updatecategory=mysql_query("update `users` set  `user_name`='$username1',`user_pass`='$userpass1' where `id`='$userid1'");
if($updatecategory)
{
echo"
<script>
$(function() {
$.jGrowl('User edited successfully', { header: 'Users' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'users.php';
}, 2000);
</script>";													
}
}																						
?>
<?php
if(isset($_POST['submitdelete']))
{
$useriddel=$_POST['useriddel'];


$delcategory=mysql_query("delete from `users` where `id`='$useriddel'");
if($delcategory)
{
echo"
<script>
$(function() {
$.jGrowl('User deleted successfully', { header: 'Users' });
});
</script>
";	
echo "<script>
setTimeout(function(){
  window.location = 'users.php';
}, 2000);
</script>";													
	
}	
}

?>
     

</html>