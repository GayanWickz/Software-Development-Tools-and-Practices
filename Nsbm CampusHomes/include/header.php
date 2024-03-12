

<div class="main-nav secondary-nav hover-success-nav py-2">
    <div class="container">
        <div class="rowA">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand position-relative" href="index.php"><img class="nav-logo" src="images/logo_nsbm.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                             <!--  <li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li> -->
                             <?php if(isset($_SESSION['uemail'])) { ?>
                                <?php if($_SESSION['uemail'] == "wareden@123" && $_SESSION['upass'] == sha1("123")) { ?>

                                    <li class="nav-item"> <a class="nav-link" href="warden.php">Warden</a> </li>
                                <?php }
                                }
                             ?>
                              
                              <?php if(isset($_SESSION['uemail'])) { ?>
                                <?php if($_SESSION['uemail'] == "admin@123" && $_SESSION['upass'] == sha1("123")) { ?>

                                    <li class="nav-item"> <a class="nav-link" href="Admin.php">Admin</a> </li>
                                <?php }
                                }
                                 ?>
                           
                            <li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li>

                            <?php if(isset($_SESSION['uemail'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>
                                    <!-- <li class="nav-item"> <a class="nav-link" href="request.php">Property Request</a> </li> -->
                                    
                                    <?php if($_SESSION['utype'] != "student") { ?> <!-- Check if user is not registered as student -->
                                        <li class="nav-item"> <a class="nav-link" href="feature.php">Your Property</a> </li>
                                    <?php } ?>
                                    
                                    <?php if($_SESSION['utype'] != "student") { ?> 
                                        <li class="nav-item"> <a class="nav-link" href="reservation_accept_reject.php">check requests</a> </li>
                                    <?php } ?>
                                    
                                    <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>	
                                </ul>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item"> <a class="nav-link" href="login.php">Login/Register</a> </li>
                            <?php } ?>

                        </ul>
                        <a class="btn btn-success d-none d-xl-block" style="border-radius:10px;" href="Addproperty.php">Add Property</a> 
                        
                        
                        
                        
                        <?php if(!isset($_SESSION['uemail'])) { ?>
                        <div class="top-contact float-right ml-3">
                            <ul class="list-text-white d-table">
                                <li><i class="fas fa-user text-success mr-1"></i><a href="login.php">Login</a>&nbsp;&nbsp;|</li>
                                <li><i class="fas fa-user-plus text-success mr-1"></i><a href="register.php">Register</a></li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
