<!DOCTYPE html>
<?php include("include/connection.php");
if($_SESSION['name']== null){
header("Location: index.php");
}
date_default_timezone_set('Africa/Cairo');
 $date = date('Y-m-d');
 $time = date("H:i:s");
$selectpersonal=mysql_fetch_array(mysql_query("select * from `personal`"));
$oldphoto=$selectpersonal['photo'];
 ?>
<html>
    
    <head>
        <title>Личная информация</title>
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
		<link rel="stylesheet" href="highlight/styles/default.css">
<script src="highlight/highlight.pack.js"></script>
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
                                <div class="muted pull-left">Личная информация</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Личная информация</legend>
                                        
                                        
                                        
                                        
										
                                        
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="textarea2">Имя</label>
                                          <div class="controls">
      <input type="text" class="span6" name="name" id="typeahead" value="<?php echo $selectpersonal['name']; ?>" required>
	  
	  
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Email</label>
                                          <div class="controls">
										  
       <input type="text" class="span6" name="email" id="typeahead" value="<?php echo $selectpersonal['email']; ?>" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Фото в шапку</label>
                                          <div class="controls">
										  
       <input class="input-file uniform_on" id="fileInput" type="file" name="file" >
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Про меня</label>
                                          <div class="controls">
										  
       <textarea name="aboutme" cols="40" rows="5" class="input-xlarge textarea"  placeholder="Enter text ..." style="width: 810px; height: 200px">
	  <?php echo $selectpersonal['aboutme'];; ?>
	  </textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Локация</label>
                                          <div class="controls">
										  
        <textarea name="location" cols="40" rows="5" class="input-xlarge textarea"  placeholder="Enter text ..." style="width: 810px; height: 200px">
	  <?php echo $selectpersonal['location'];; ?>
	  </textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Уменя\достижения</label>
                                          <div class="controls">
										  
        <textarea name="job" cols="40" rows="5" class="input-xlarge textarea"  placeholder="Enter text ..." style="width: 810px; height: 200px">
	  <?php echo $selectpersonal['experience'];; ?>
	  </textarea>
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
		
    </body>
	<?php
									if(isset($_POST['submit']))
									{
									$name=$_POST['name'];
									$email=$_POST['email'];
									$aboutme=$_POST['aboutme'];
									$location=$_POST['location'];
									$job=$_POST['job'];
									$place_file=$_FILES["file"]["name"];
									$selectnumsocial=mysql_num_rows(mysql_query("select * from `personal`"));
									if($selectnumsocial == 0)
									{
									if($place_file == null)
{
$about=mysql_query("insert into `personal` values('','$email','$aboutme','$location','$name','','$job')");
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
      "imagesupload/" .$place_file); 
$about=mysql_query("insert into `personal` values('','$email','$aboutme','$location','$name','$place_file','$job')");	  
}
									}
									else
									{
									if($place_file == null)
									{
$about=mysql_query("update `personal` set `email`='$email',`aboutme`='$aboutme',`location`='$location',`name`='$name',`experience`='$job'");
}
else
{
$about=mysql_query("update `personal` set `email`='$email',`aboutme`='$aboutme',`location`='$location',`name`='$name',`photo`='$place_file',`experience`='$job'");
move_uploaded_file($_FILES["file"]["tmp_name"],
      "imagesupload/" .$place_file); 
	  unlink("imagesupload/".$oldphoto);
}
									}
									if($about)
									{
									echo"
<script>
$(function() {
$.jGrowl('Personal edited successfully', { header: 'Personal' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'personal.php';
}, 2000);
</script>";
									}
									}
									
									
									
									?>
	

</html>