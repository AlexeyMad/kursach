<!DOCTYPE html>
<?php include("admin/include/connection.php"); ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Портфолио. Абдуллин Алексей</title>

    <!-- бустрап ксс, я не понимаю почему оно тут, но так надо. Мне скасзали, что можно использовать бустрап. Была бы моя воля - я бы сделал все как надо на вордпресе или еще чем-нибудь, но нет, надо   из палок и изоленты. -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/letmedie.css" rel="stylesheet" type="text/css">

    <!-- шрифты -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  
	<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
	 

</head>

<body id="page-top" class="index">
<?php
	$selectarraypersonal=mysql_fetch_array(mysql_query("select * from `personal`"));
	?>
    <!-- навигация -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- АДАПТИВНАСТЬ -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top"><?php echo $selectarraypersonal['name']; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Портфолио</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Про меня</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Контакты</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
	
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="admin/imagesupload/<?php echo $selectarraypersonal['photo']; ?>" alt="">
                    <div class="intro-text">
                        <span class="name"><?php echo $selectarraypersonal['name']; ?></span>
                        <hr class="star-light">
                        <span class="skills"><?php echo $selectarraypersonal['experience']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Мои работы</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
			<?php
			$selectportfolio=mysql_query("select * from `portfolio`");
			while($selectarrayportfolio=mysql_fetch_array($selectportfolio))
			{
			?>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php echo $selectarrayportfolio['portfolio_id'];  ?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img  class="img-responsive" src="admin/imagesportfolio/<?php echo $selectarrayportfolio['portfoilo_image'];  ?>" alt="" />
                    </a>
                </div>
				<?php
				}
				?>
                
               
               
                
            </div>
        </div>
    </section>
<?php
$selectabout=mysql_fetch_array(mysql_query("select * from `about`"));
?>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Про меня</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>
					<?php echo $selectabout['col1']; ?>
					</p>
                </div>
                <div class="col-lg-4">
                    <p>
					<?php echo $selectabout['col2']; ?>
					</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Напишите мне</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form role="form" method="post" action="#">
                        <div class="row">
                            <div class="form-group col-xs-12 floating-label-form-group">
                                <label for="name">Имя</label>
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 floating-label-form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 floating-label-form-group">
                                <label for="message">Сообщение(но я не отвечу. Пишите на devcorp.ru)</label>
                                <textarea placeholder="Message" name="message" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" name="submit" class="btn btn-lg btn-success">Отправить</button>
                            </div>
                        </div>
                    </form>
					
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Где меня найти</h3>
                        <?php
						echo $selectarraypersonal['location'];
						?>
                    </div>
                    <div class="footer-col col-md-4">
					<?php
					$sociallinks=mysql_fetch_array(mysql_query("select * from `social_links`"));
					?>
                        <h3>В социальных сетях</h3>
                        <ul class="list-inline">
                            <li><a href="<?php echo $sociallinks['vk']; ?>" class="btn-social btn-outline"><i class="fa fa-vk"></i></a>
                            </li>
                    
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Я</h3>
                        <p><?php
						echo $selectarraypersonal['aboutme'];
						?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy;  <?php echo date("Y"); ?>  - <?php echo $selectarraypersonal['name']; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
	<?php
	$selectport=mysql_query("select * from `portfolio`");
	while($selectportarray=mysql_fetch_array($selectport))
	{
	?>
    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $selectportarray['portfolio_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $selectportarray['portfolio_title']; ?></h2>
                            <hr class="star-primary">
                           
                            <p>
							<?php echo $selectportarray['portfolio_desc']; ?>
							</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><?php echo $selectportarray['client_name']; ?></strong>
                                </li>
                                <li>Date: <strong><?php echo $selectportarray['date']; ?></strong>
                                </li>
								<?php
								$serviceid=$selectportarray['service_id'];
								$selectservice=mysql_fetch_array(mysql_query("select * from `service` where `service_id`='$serviceid'"));
								?>
                                <li>Service: <strong><?php echo $selectservice['service_name']; ?></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	}
	?>
    
    
    
    
    
<!-- тут я подключтл кучу всякого всякого. Я еще хотел подключить точечки(партиклес), но вспомнил, что из-за них падают компы в нашей школе для особенных ребят -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/letmedie.js"></script>
	<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>

</body>
<?php
		  if(isset($_POST['submit']))
		  {
		  $name=$_POST['name'];
  $message=$_POST['message'];
  $email =$_POST['email'];

$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
  $msg="Name :".$name."\n"."Message:".$message;
  $to=$selectarraypersonal['email'];
   
  mail($to,'new message',$msg,$headers); 
 echo"
<script>
$(function() {
$.jGrowl('Your email has been sent', { header: 'Email' });
});
</script>
";

		  }
		  ?>

</html>