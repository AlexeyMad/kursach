<?php
include("include/connection.php");

$id=$_GET['id'];
$detailservice=mysql_fetch_array(mysql_query("select * from `service` where `service_id`='$id'"));
$service_name=$detailservice['service_name'];
echo '<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3>Delete service</h3>
											</div>
<div class="modal-body">
<form action="#" method="post" id="form1">

          <div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"
style="width:300px;"><b>Do U want to delete this Service: '.$service_name.'</b> </label>
                                        
<input type="hidden" name="serviceiddel" value="'.$id.'"/>

										
									</div>
                                    
                                    
                                    
                                   
                                    
                                    <div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-danger" style="position:relative;margin-left:100px;" type="submit"   name="submitdelete" >
												<i class="icon-remove icon-white"></i>
												Delete
											</button>
                                            
                                            

											&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset" id="cancel">
												<i class="icon-undo bigger-110"></i>
												Cancel
											</button>
										</div>
									
					
                                            </form>
											</div>
											';


?>

 <script>
		$(document).ready(function(e) {
            
			$(".close").click(function(){
			setTimeout(function(){
  window.location = 'service.php';
}, 100);
			});
			
			$(document).keyup(function(e) {
     
  if (e.keyCode == 27) { $('.close').click(); }   // esc
});
$("#cancel").click(function(){
$('.close').click();
});
        });
		</script>