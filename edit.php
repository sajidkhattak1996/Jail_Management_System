<!DOCTYPE html>
<html>

<head>
   
    <?php  
        include 'process/header.html'; 
    
        require_once ('process/dbh.php');
		
        
    ?>

<?php  
        $id = (isset($_GET['id']) ? $_GET['id'] : '');

       
        $single_emp_query ="SELECT * , designation_list.D_id, designation_list.Designation_name, list_of_jail.J_id, list_of_jail.Name_of_jail FROM employee_records INNER JOIN designation_list ON employee_records.D_id=designation_list.D_id INNER JOIN list_of_jail ON employee_records.Jail_id=list_of_jail.J_id  WHERE employee_records.E_id=$id";


        // echo "id ====".$id;
        $run_single_emp_query=mysqli_query($conn , $single_emp_query);



        if(mysqli_num_rows($run_single_emp_query) == 1){
            while($emp_record=mysqli_fetch_assoc($run_single_emp_query)){
                $name = $emp_record['Name'];
                $father_name = $emp_record['Father_name'];
            
                $Designation = $emp_record['Designation_name'];
                $birthday = $emp_record['Dob'];
                $gender = $emp_record['gender'];
                $contact = $emp_record['Contact'];
                $address = $emp_record['Address'];
                $gender = $emp_record['gender'];
                $name_of_jail =$emp_record['Name_of_jail'];
            
                $cnic = $emp_record['Cnic'];
                $personal_no = $emp_record['Personal_no'];
                $degree = $emp_record['Qualification'];
    
                $D_id = $emp_record['D_id'];
                $J_id = $emp_record['J_id'];
    
            };
        }
    ?>


</head>
<body>
<div class="top_header container-fluid px-5 pt-2 pb-1">
		<h1><?php  echo $name_of_jail   ?></h1>
	</div>

		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg nav_color  s py-3 " id="mainNav">
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand text-dark" href="#page-top"><?php   echo $name  ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="aloginwel.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="addemp.php">Add Employee</a></li>
                        <li class="nav-item"><a class="nav-link active" href="viewemp.php">View Employee</a></li>
                        <li class="nav-item"><a class="nav-link" href="viewundertransfer.php">Under Transfer</a></li>
                        <li class="nav-item"><a class="nav-link active" href="view_arival.php">Under Arival</a></li>
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
                    <h2 class="title">Update Employee Information</h2>
                    <form id = "registration" action="process/updateempprocess.php?id=<?php echo $id; ?>" method="POST">


                        

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="Name" name="name" required="required" value="<?php  echo $name ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Father Name" name="father_name" required="required" value="<?php  echo $father_name ?>">
                                </div>
                            </div>
                        </div>

                        <p>Designation</p>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple ">
                                <select name="Designation" id="d_id" required="required">
                                    <option value="<?php echo $D_id ?>"  selected="selected"><?php echo $Designation ?></option>
                                    <?php  
                                    $designation_query= "SELECT * FROM `designation_list` WHERE D_id !=$D_id";
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
                                    <input class="input--style-1" type="date" placeholder="Date of Birth" name="birthday" required="required" value="<?php echo $birthday  ?>">
                                   
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group p-2">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option selected="selected" ><?php echo $gender ?></option>
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
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="contact" required="required" value="<?php echo $contact ?>">
                        </div>
<!-- 
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="NIC" name="nid" required="required">
                        </div> -->

                        
                         <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="address" required="required" value="<?php echo $address ?>">
                        </div>
<!-- 
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Name of Jail" name="dept" required="required">
                        </div> -->


                        <p>Name of Jail</p>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple ">
                                <select name="name_of_jail" id="d_id" required="required">
                                    <option value="<?php echo $J_id ?>"  selected="selected"><?php  echo $name_of_jail ?></option>
                                    <?php  
                                    $jail_query= "SELECT * FROM `list_of_jail` WHERE J_id !=$J_id";
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
                                    <input class="input--style-1" type="number" placeholder="CNIC" name="cnic" required="required" value="<?php echo $cnic ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="number" placeholder="Personal No" name="personal_no" required="required" value="<?php echo $personal_no ?>">
                                </div>
                            </div>
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Qualification" name="degree" required="required" value="<?php echo $degree ?>">
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






































