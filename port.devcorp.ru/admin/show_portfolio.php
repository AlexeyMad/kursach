<!DOCTYPE html>
<?php include("include/connection.php");


    	
		
?>
<html>
    
    <head>
        <title>Портфолио</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/pagination.css" rel="stylesheet" type="text/css" />
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script>
  function deleteportfolio(id)
  {
  var allid=parseInt(id);
  $(document).ready(function(e) {
$.ajax({
url:"delete_portfolio.php",
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

                    <br/>
                  <div class="control-group">
                                          
                                          <div class="controls">
										  
											
											
											
											
                                          
                                        										
										
                    

                    

                    

                    
                    

                     <div class="row-fluid">
					 <a href="add_portfolio.php"  class="btn btn-primary">Добавить портфолио</a>
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Портфолио</div>
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12" id="resultsnippet">
  		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
										<thead>
											<tr>
											<td>Ид</td>
												<td>Имя</td>
												
												<td>Картинка</td>
												<td>Клиент</td>
												<td>Действия</td>
											</tr>
										</thead>
										<tbody >
										<?php
										$selectportfolio=mysql_query("select * from `portfolio`");
					
					
										
										while($selectportfolioarray=mysql_fetch_array($selectportfolio))
										{
										

										?>
											<tr class="odd gradeX">
												<td>
							<a href="show_view_portfolio.php?id=<?php echo $selectportfolioarray['portfolio_id']; ?>">
												<?php echo  $selectportfolioarray['portfolio_id'];  ?>
												</a>
												</td>
												<td><?php echo $selectportfolioarray['portfolio_title']; ?></td>
	<td><img src="imagesportfolio/<?php echo $selectportfolioarray['portfoilo_image']; ?>" style="width:50px;"></td>
												<td class="center"><?php echo $selectportfolioarray['client_name']; ?></td>
												<td class="center">
			 
					<a class="btn btn-primary"  href="edit_portfolio.php?id=<?php echo $selectportfolioarray['portfolio_id']; ?>"><i class="icon-pencil icon-white"></i> Редактировать</a>
					<a href="#myModal" id="<?php echo $selectportfolioarray['portfolio_id']; ?>del" onclick="deleteportfolio(this.id)" data-toggle="modal"  class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
												
												
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
				<div id="myModal" class="modal hide">
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Добавить</h3>
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
if(isset($_POST['submitdelete']))
{
$portfolioiddel=$_POST['portfolioiddel'];
$selectportfolio=mysql_fetch_array(mysql_query("select * from `portfolio` where `portfolio_id`='$portfolioiddel'"));
$oldphoto=$selectportfolio['portfoilo_image'];
unlink("imagesportfolio/".$oldphoto);
$delportfolio=mysql_query("delete from `portfolio` where `portfolio_id`='$portfolioiddel'");


if($delportfolio)
{
echo"
<script>
$(function() {
$.jGrowl('Portfolio deleted successfully', { header: 'Portfolio' });
});
</script>
";	
echo "<script>
setTimeout(function(){
  window.location = 'show_portfolio.php';
}, 2000);
</script>";													
	
}	
}

?>

		
		

</html>