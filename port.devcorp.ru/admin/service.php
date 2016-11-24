<!DOCTYPE html>
<?php include("include/connection.php");
if($_SESSION['name']== null){
header("Location: index.php");
}
 ?>
<html>
    
    <head>
        <title>Services</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		 <script src="assets/jquery.js"></script>
		<script>
  function showdetails(id)
  {
  $(document).ready(function(e) {
$.ajax({
url:"show_details_service.php",
type:"GET",
data:"id="+id,
success: function(msg)
{
$("#myModal").html(msg);
}	
});
  });
  }  
  </script>
  <script>
  function deleteservice(id)
  {
  var allid=parseInt(id);
  $(document).ready(function(e) {
$.ajax({
url:"delete_all_service.php",
type:"GET",
data:"id="+allid,
success: function(msg)
{
$("#myModal").html(msg);

}	
});
  });
  }  
  </script>
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
						<a href="#myModal" data-toggle="modal" class="btn btn-primary">Add Service</a>
                        <div class="block">
						
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Services</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-striped">
						              <thead>
						                <tr>

						                 <th >Name</th>
										

										<th class="center">actions</th>
						                 
						                </tr>
						              </thead>
						              <tbody>
									  <?php
				$selectservice=mysql_query("select * from `service`");
while($selectarrayservice=mysql_fetch_array($selectservice))
													{
													
													
?>
						                <tr>
						                  <td><?php echo $selectarrayservice['service_name']; ?></td>
						                  
						                  <td>
				<a class="btn btn-primary"  href="#myModal" id="<?php echo $selectarrayservice['service_id']; ?>" onclick="showdetails(this.id)" data-toggle="modal" ><i class="icon-pencil icon-white"></i> Edit</a>				
				<a class="btn btn-danger" href="#myModal" id="<?php echo $selectarrayservice['service_id']; ?>del" onclick="deleteservice(this.id)" data-toggle="modal" ><i class="icon-remove icon-white"></i> Delete</a>
										  </td>
						                </tr>
										<?php
										}
										?>
						               
						                
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                   

                   

                    



                </div>
            </div>
            <hr>
			<div id="myModal" class="modal hide">
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Add service</h3>
											</div>
											<div class="modal-body">
												<form action="#" method="post" enctype="multipart/form-data" id="form1">
											
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  for="form-input-readonly">
  <b>Service name</b></label>


										<div class="col-sm-9">
			<input type="text"  placeholder="Service name"  style="width:350px;" name="service" required/>
											
										</div>
									</div>
									
                                    <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
				<button  type="submit" name="submit" class=" btn-large btn-block btn-primary">Save</button>
                                            
                                            

											&nbsp; &nbsp; &nbsp;
											
										</div>
									</div>
					
                                            </form>
											
										</div>
										</div>
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
												
 
	           
	 $service=$_POST['service'];              
	$insert=mysql_query("insert into `service` values('','$service')");        
if($insert)
{
echo"
<script>
$(function() {
$.jGrowl('Web service added successfully', { header: 'Web service' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'service.php';
}, 2000);
</script>";	
}
}
												
											
											
											?>
											<?php
if(isset($_POST['submit1']))
{
$serviceid1=$_POST['serviceid1'];
$service1=$_POST['service1'];
$updateservice=mysql_query("update `service` set  `service_name`='$service1' where `service_id`='$serviceid1'");
if($updateservice)
{
echo"
<script>
$(function() {
$.jGrowl('Web service edited successfully', { header: 'Web service' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'service.php';
}, 2000);
</script>";													
}
}																						
?>
<?php
if(isset($_POST['submitdelete']))
{
$serviceiddel=$_POST['serviceiddel'];


$delservice=mysql_query("delete from `service` where `service_id`='$serviceiddel'");
if($delservice)
{
echo"
<script>
$(function() {
$.jGrowl('Web service deleted successfully', { header: 'Web service' });
});
</script>
";	
echo "<script>
setTimeout(function(){
  window.location = 'service.php';
}, 2000);
</script>";													
	
}	
}

?>
     

</html>