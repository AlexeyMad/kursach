<!DOCTYPE html>
<?php include("include/connection.php");
if($_SESSION['name']== null){
header("Location: index.php");
}
date_default_timezone_set('Africa/Cairo');
 $date = date('Y-m-d');
 $time = date("H:i:s");
 $id=$_GET['id'];
 $selectportfolio=mysql_fetch_array(mysql_query("select * from `portfolio` where `portfolio_id`='$id'"));
 $oldphoto=$selectportfolio['portfoilo_image'];
 ?>
<html>
    
    <head>
        <title>Edit portfolio</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <?php include("include/header.php"); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include("include/menu.php");?>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->


                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Portfolio</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Edit portfolio</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Title portfolio </label>
                                          <div class="controls">
                   <input type="text" class="span6" name="title" value="<?php echo $selectportfolio['portfolio_title']; ?>" id="typeahead" required>
                                            
                                          </div>
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="select01">Webservices</label>
                                          <div class="controls">
                                            <select id="select01" name="webservices" class="chzn-select" required>
											<option value=""></option>
                                              <?php
											  $selectservice=mysql_query("select * from `service`");
											  while($selectcatarray=mysql_fetch_array($selectservice))
											  {
		 echo '<option value="'.$selectcatarray['service_id'].'"';
		 if($selectportfolio['service_id'] == $selectcatarray['service_id'])
		 {
		 echo 'selected="selected"';
		 }
		 echo '>'.$selectcatarray['service_name'].'</option>';
											  }
											  ?>
                                            </select>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="typeahead">Client name </label>
                                          <div class="controls">
                  <input type="text" value="<?php echo $selectportfolio['client_name'] ?>" class="span6" name="client_name" id="typeahead" required>
                                            
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Photo</label>
                                          <div class="controls">
										  
       <input class="input-file uniform_on" id="fileInput" type="file" name="file" >
                                          </div>
                                        </div>
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="textarea2">Description</label>
                                          <div class="controls">
      <textarea name="description"  cols="40" rows="5" class="input-xlarge textarea" placeholder="Enter text ..." style="width: 810px; height: 200px">
	  <?php echo  $selectportfolio['portfolio_desc']; ?>
	  </textarea>
                                          </div>
                                        </div>
										
                                        <div class="form-actions">
          <button type="submit" style="width:180px;left:50px;position:relative;" class="btn btn-primary" name="submit">Save changes</button>
                                          
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
            <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
         <script src="vendors/jGrowl/jquery.jgrowl.js"></script>    

        <script src="assets/scripts.js"></script>
        <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
		<script>
		$(document).ready(function(e) {
		$("#select01").change(function() {
		var id=$("#select01").val();		
	$.ajax({
url:"show_sub_category.php",
type:"GET",
data:"id="+id,
success: function(msg)
{
$("#select02").html(msg);
}	
});
  });
  });
		</script>
    </body>
	<?php 
									if(isset($_POST['submit']))
									{
									$title=$_POST['title'];
									$webservices=$_POST['webservices'];
									$client_name=$_POST['client_name'];
									$description=$_POST['description'];
									$place_file=$_FILES["file"]["name"];
									if($place_file == '')
									{
$portfolio=mysql_query("update `portfolio` set `portfolio_title`='$title',`portfolio_desc`='$description',`client_name`='$client_name',`date`='$date',
`service_id`='$webservices' where `portfolio_id`='$id'");
}
else
{
$portfolio=mysql_query("update `portfolio` set `portfolio_title`='$title',`portfolio_desc`='$description',`client_name`='$client_name',`date`='$date',
`service_id`='$webservices',`portfoilo_image`='$place_file' where `portfolio_id`='$id'");
move_uploaded_file($_FILES["file"]["tmp_name"],
      "imagesportfolio/" .$place_file); 
unlink("imagesportfolio/".$oldphoto);
}
	
	  

if($portfolio)
{
echo"
<script>
$(function() {
$.jGrowl('Portfolio edited successfully', { header: 'Portfolio' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'show_portfolio.php';
}, 2000);
</script>";

}
else
{
echo 'failed';
}
									}
									
									
									
									
									?>

</html>