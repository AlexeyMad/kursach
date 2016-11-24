
<?php
include("include/connection.php");

if(isset($_GET['id']))
{
$id=$_GET['id'];
$detailservice=mysql_fetch_array(mysql_query("select * from `service` where `service_id`='$id'"));
$service_name=$detailservice['service_name'];


echo '
<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Редактировать ветку</h3>
											</div>
											<div class="modal-body">
<form action="#" method="post" id="form1">
											
                                            
                                        


										

											
										
                                    <br/>
 <input  type="hidden"  value="'.$id.'" style="width:350px;" name="serviceid1" /> 

 
 
                           <div class="form-group" style="margin-bottom:50px;">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Имя</b></label>

										<div class="col-sm-9">
<input type="text"   value="'.$service_name.'"  name="service1"   class="col-xs-10 col-sm-5" style="width:350px;"  required/>

										</div>
									</div>
                                    
                                    
                                    
                                   
									
                                    
                                    <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
<button class="btn btn-primary" style="width:150px;position:relative;left:120px;" type="submit" id="submit1"  name="submit1" onclick="submitForm()">
												<i class="icon-pencil icon-white"></i>
												Готово
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
  window.location = 'service.php';
}, 500);
			});
			
			$(document).keyup(function(e) {
     
  if (e.keyCode == 27) { $('.close').click(); }   // esc
});
        });
		</script>