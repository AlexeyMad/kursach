
<?php
include("include/connection.php");

if(isset($_GET['id']))
{
$id=$_GET['id'];
$pageid=$_GET['pageid'];
$detailcategories=mysql_fetch_array(mysql_query("select * from `sub-category` where `sub_category_id`='$id'"));
$category_name=$detailcategories['sub_category_name'];


echo '
<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Edit subcategory</h3>
											</div>
											<div class="modal-body">
<form action="#" method="post" id="form1">
											
                                            
                                        


										

											
										
                                    
 <input  type="hidden"  value="'.$id.'" style="width:350px;" name="categoryid1" /> 

 
 
                           <div class="form-group" >
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b> Category name </b></label>

										<div class="col-sm-9">
<input type="text"   value="'.$category_name.'"  name="subcategory1"   class="col-xs-10 col-sm-5" style="width:350px;"  required/>

										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"  for="form-input-readonly">
  <b>Category</b></label>
  <div class="col-sm-9">
			<select  style="width:350px;" name="category1" >';
                 $selectcat=mysql_query("select * from `category`");
			while($selectcatarray=mysql_fetch_array($selectcat))
			{
			echo '<option value="'.$selectcatarray['category_id'].'"';
			if($detailcategories['category_id'] == $selectcatarray['category_id'])
			{
			echo 'selected="selected"';
			}
			echo '>'.$selectcatarray['category_name'].'</option>';
			}                   
                                   echo '</select>
											
										</div>
									</div>
									
                                    
                                    <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
<button class="btn btn-primary" style="width:150px;position:relative;left:120px;" type="submit" id="submit1"  name="submit1" onclick="submitForm()">
												<i class="icon-pencil icon-white"></i>
												Edit
											</button>
                                            
                                            

											
											
										</div>
									
					
                                            </form>
											</div>



';
}

?>

  
  
          <script>
		$(document).ready(function(e) {
            
			$(".close").click(function(){
			setTimeout(function(){
  window.location = 'sub_category.php?id=<?php echo $pageid ?>';
}, 500);
			});
			
			$(document).keyup(function(e) {
     
  if (e.keyCode == 27) { $('.close').click(); }   // esc
});
        });
		</script>