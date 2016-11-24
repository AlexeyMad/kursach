<!DOCTYPE html>
<?php include("include/connection.php");
if($_SESSION['name']== null){
header("Location: index.php");
}
date_default_timezone_set('Africa/Cairo');
 $date = date('Y-m-d');
 $time = date("H:i:s");
 $id=$_GET['id'];
 $selectsnippet=mysql_fetch_array(mysql_query("select * from `code` where `code_id`='$id'"));
 $subcategory=$selectsnippet['sub_category_id'];
 $getcatid=mysql_fetch_array(mysql_query("select * from `sub-category` where `sub_category_id`='$subcategory'"));
 $categoryid=$getcatid['category_id'];
 $getcatname=mysql_fetch_array(mysql_query("select * from `category` where `category_id`='$categoryid'"));
 
 $subcatname=$getcatid['sub_category_name'];
 ?>
<html>
    
    <head>
        <title>View snippet</title>
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
<script>hljs.initHighlightingOnLoad();</script>
<script>
var hljs = require('highlight/highlight.pack.js');
hljs.highlightAuto(code).value;
$(document).ready(function() {
  $('pre code').each(function(i, e) {hljs.highlightBlock(e)});
});
</script>
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
                                <div class="muted pull-left">Code Snippet</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
                                    <form class="form-horizontal" action="#" method="post">
				<a href="show_snippet.php?idcat=<?php echo $categoryid; ?>&idsubcat=0"><?php echo $getcatname['category_name']; ?></a>->
				<a href="show_snippet.php?idcat=<?php echo $categoryid; ?>&idsubcat=<?php echo  $subcategory; ?>"><?php echo $subcatname; ?></a>
                                      <fieldset>
									 
                                        <legend><?php echo $selectsnippet['code_title']; ?></legend>
                                       
                                        
                                        
                                        
										
                                        
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="textarea2">Description</label>
                                          <div class="controls">
      
	  <div class="span6"   id="typeahead" style="top:5px;position:relative;width:600px;">
	  <b><?php echo $selectsnippet['code_description'] ?></b></div>
	  
                                          </div>
                                        </div>
										<div class="control-group">
                                          <label class="control-label" for="textarea2">Code</label>
                                          <div class="controls">
										  
      <pre><code>
	<?php highlight_string($selectsnippet['source_code']);?>
	  </code></pre>
                                          </div>
                                        </div>
										<?php
			$selectnumrelated=mysql_num_rows(mysql_query("select * from `related_code` where `code_id`='$id'"));
			if($selectnumrelated > 0)
			{
										?>
										<div class="control-group" style="display:none;">
                                          <label class="control-label" for="textarea2">Related Code</label>
                                          <div class="controls">
		<?php
		
      $selectrelatedsnippet=mysql_query("select * from `related_code` where `code_id`='$id'");
	  while($selectarrayrelatedsnippet=mysql_fetch_array($selectrelatedsnippet))
	  {
	echo '<a  href="show_view_snippet_related.php?id='.$selectarrayrelatedsnippet['related_code_id'].'">'.$selectarrayrelatedsnippet['code_title'].'</a><br/>';
	
	}
	
	?>
	  
                                          </div>
                                        </div>
										<?php
										}
										?>
										
                                        
                                      </fieldset>
                                    </form>
									<br/>
		<a href="add_code.php?id=<?php echo $id; ?>" style="width:180px;left:200px;position:relative;display:none;" class="btn btn-primary">Add Code</a>
									

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                 

                </div>
            </div>
            <hr>
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
	
</html>