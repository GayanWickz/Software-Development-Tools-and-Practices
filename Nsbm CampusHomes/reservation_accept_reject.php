<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}								
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">


<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<title>NSBM CampusHomes</title>
</head>
<body>




<div id="page-wrapper">
    <div class="row"> 
        
		<?php include("include/header.php");?>
    
		 
		 
		<!--	Submit property   -->
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Students Requested Property</h2>
							<?php 
								if(isset($_GET['msg']))	
								echo $_GET['msg'];	
							?>
                        </div>
					</div>
					<table class="items-list col-lg-12 table-hover " style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">Property-Id</th>
                               <th class="text-white font-weight-bolder">Requested Student Email</th>
                                <th class="text-white font-weight-bolder">Status</th>
                                <th class="text-white font-weight-bolder">Requested On</th>
								
                                <th class="text-white font-weight-bolder">Accept</th>
								<th class="text-white font-weight-bolder">Reject</th>
                             </tr>
                        </thead>
                        <tbody>
						
							<?php 
							$uid=$_SESSION['uid'];
                            $uemail=$_SESSION['uemail'];
							$query=mysqli_query($con,"SELECT * FROM `reservation_requests` ");
								while($row=mysqli_fetch_array($query))
								{
							?>
                            <tr>
                                <td>
									
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize"><?php echo $row['1'];?></a></h5>
                                    </div>
								</td>
                                <td><?php echo $row['2'];?></td>
                                <td class="text-capitalize"><?php echo $row['3'];?></td>
                                <td><?php echo $row['4'];?></td>
								
                                <td><a class="btn btn-info" href="res_accept.php?id=<?php echo $row['0'];?>">Accept</a></td>
								<td><a class="btn btn-danger" href="res_reject.php?id=<?php echo $row['0'];?>">Reject</a></td>
                            </tr>
							<?php } ?>
							
                        </tbody>
                    </table>            
            </div>
        </div>
	<!--	Submit property   -->
        
        
     
		
		
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
      
    </div>
</div>


<!--	Js Link--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>

</body>
<?php include("footer.php");?>
</html>