<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
							
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">



<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/style.css">


<title>NSBM CampusHomes</title>
<style>
.image-container {
    height: 200px; 
    overflow: hidden; 
    position: relative; 
}

.image-container img {
    width: auto; 
    height: 100%; 
    position: absolute; 
    top: 50%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    object-fit: cover; 
}


.accept-reject-buttons {
    display: flex;
}

.accept-reject-buttons form {
    margin-right: 10px; 
}
</style>



</head>
<body>




<div id="page-wrapper">
  
        <?php include("include/header.php");?>


        
        <?php






// Include the file
include "warden map/com.php";
?>

                        </div>

        <div class="full-row">
            <div class="container">
                <div class="row">
                    <?php 
                    $query=mysqli_query($con,"SELECT property.*, user.uname,user.utype FROM `property`, `user` WHERE property.uid=user.uid");
                    while($row=mysqli_fetch_array($query))
                    {
                    ?>
                    <div class="col-md-6">
                        <div class="featured-thumb hover-zoomer mb-4">
                            
                        <div class="image-container">
                                <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                <div class="sale bg-success text-white">For <?php echo $row['4'];?></div>
                                <div class="price text-primary text-capitalize">Rs.<?php echo $row['8'];?> <span class="text-white"><?php echo $row['10'];?> Sqft</span></div>
                            </div>


                            <div class="featured-thumb-data shadow-one">
                                <div class="p-4">
                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize">
                                        <a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a>
                                    </h5>
                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['9'];?></span> 
                                </div>
                                <div class="px-4 pb-4 d-inline-block w-100">
                                    <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['uname'];?></div>
                                    <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div>
                                </div>
                                <div class="accept-reject-buttons">
                                    <form action="warden_accept.php" method="post">
                                        <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">
                                        <input type="text" name="reason" placeholder="Reason (optional)" class="form-control mb-2">
                                        <button type="submit" name="accept" class="btn btn-success">Accept</button>
                                    </form>
                                    <form action="warden_reject.php" method="post">
                                        <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">
                                        <input type="text" name="reason" placeholder="Reason (optional)" class="form-control mb-2">
                                        <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
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

<script src="js/wow.js"></script> 

<script src="js/custom.js"></script>
</body>
<?php include("footer.php");?>
</html>