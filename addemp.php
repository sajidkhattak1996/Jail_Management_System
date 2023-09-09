<!DOCTYPE html>
<html>

<head>
   
    <?php  
        include 'process/header.html'; 
    
        require_once ('process/dbh.php');
		
        
    ?>


</head>
<body>
<div class="top_header container-fluid px-5 pt-2 pb-1">
		<h1>Welcome to Central Prison DIKhan</h1>
	</div>

		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg nav_color  s py-3 " id="mainNav">
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand text-dark" href="#page-top">Empolyee Dashboard</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="aloginwel.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="addemp.php">Add Employee</a></li>
                        <li class="nav-item"><a class="nav-link" href="viewemp.php">View Employee</a></li>
                        <li class="nav-item"><a class="nav-link" href="viewundertransfer.php">Under Transfer List</a></li>
                        <li class="nav-item"><a class="nav-link" href="empleave.php">Employee Leave</a></li>
                        <li class="nav-item"><a class="nav-link" href="alogin.html">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

	<div class="divider bg-rd"></div>


    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">


                        

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="Name" name="name" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Father Name" name="father_name" required="required">
                                </div>
                            </div>
                        </div>

                        <p>Designation</p>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple ">
                                <select name="Designation" id="d_id" required="required">
                                    <option value="Chose Designation From List" disabled="disabled" selected="selected">Chose Designation From List</option>
                                    <?php  
                                    $designation_query= "SELECT * FROM `designation_list`";
                                    $designation_records = mysqli_query($conn , $designation_query);

                                    while($designation_list = mysqli_fetch_assoc($designation_records))
                                    { ?>
                                        <option value="<?php echo  $designation_list['D_id'];  ?>">
                                            <?php  echo $designation_list['Designation_name'];  ?>
                                        </option>

                                   <?php }
                                    
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                         </div>

                      


                        <p>Date of Birth</p>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="Date of Birth" name="birthday" required="required">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group p-2">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="contact" required="required" >
                        </div>
<!-- 
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="NIC" name="nid" required="required">
                        </div> -->

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="address" required="required">
                        </div>
<!-- 
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Name of Jail" name="dept" required="required">
                        </div> -->


                        <p>Name of Jail</p>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple ">
                                <select name="name_of_jail" id="d_id" required="required">
                                    <option value="Chose Jail From List" disabled="disabled" selected="selected">Chose Jail From List</option>
                                    <?php  
                                    $jail_query= "SELECT * FROM `list_of_jail`";
                                    $jail_records = mysqli_query($conn , $jail_query);

                                    while($jail_list = mysqli_fetch_assoc($jail_records))
                                    { ?>
                                        <option value="<?php echo  $jail_list['J_id'];  ?>">
                                            <?php  echo $jail_list['Name_of_jail'];  ?>
                                        </option>

                                   <?php }
                                    
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                         </div>
                        
                         

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="number" placeholder="CNIC" name="cnic" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="number" placeholder="Personal No" name="personal_no" required="required">
                                </div>
                            </div>
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Qualification" name="degree" required="required">
                        </div>

                        <!-- <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" required="required">
                        </div> -->

                     


                        <!-- <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="file" name="file">
                        </div> -->







                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
