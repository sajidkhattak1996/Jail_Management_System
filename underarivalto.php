<!DOCTYPE html>
<html>

<head>
   
    <?php  
        include 'process/header.html'; 
    
        require_once ('process/dbh.php');
		
        
    ?>

<?php  
        $id = (isset($_GET['sno']) ? $_GET['sno'] : '');
        $sno = $_GET['sno'];
       
        $single_emp_query ="SELECT employee_records.Name,employee_records.Father_name,designation_list.Designation_name, list_of_jail.Name_of_jail, under_transfer_list.*
        FROM under_transfer_list
        INNER JOIN employee_records ON under_transfer_list.E_id=employee_records.E_id
        INNER JOIN designation_list ON under_transfer_list.Designation_id=designation_list.D_id
        INNER JOIN list_of_jail ON under_transfer_list.current_jail_id=list_of_jail.J_id
        WHERE under_transfer_list.S_no='$sno'";


        // echo "id ====".$id;
        $run_single_emp_query=mysqli_query($conn , $single_emp_query);



        if(mysqli_num_rows($run_single_emp_query) == 1){
            while($emp_record=mysqli_fetch_assoc($run_single_emp_query)){
                $name = $emp_record['Name'];
                $father_name = $emp_record['Father_name'];
                $Designation = $emp_record['Designation_name'];

                $name_of_jail =$emp_record['Name_of_jail'];

                // echo $emp_record['Transfer_order_no'];
                // echo $emp_record['Transfer_order_date'];
                
                $tranfer_order_no = $emp_record['Transfer_order_no'];
                $tranfer_order_date = $emp_record['Transfer_order_date'];
            

                $current_jail_id=$emp_record['current_jail_id'];
                $name_of_jail_query="SELECT Name_of_jail FROM list_of_jail WHERE J_id='$current_jail_id'";
                $name_result=mysqli_query($conn ,$name_of_jail_query);
                $current_jail_name=mysqli_fetch_assoc($name_result);


                $transfer_jail_id=$emp_record['transfer_jail_id'];
                $name_of_transfer_jail_query="SELECT Name_of_jail FROM list_of_jail WHERE J_id='$transfer_jail_id'";
                $name_trasnfer_result=mysqli_query($conn ,$name_of_transfer_jail_query);
                $transfer_jail_name=mysqli_fetch_assoc($name_trasnfer_result);
                
    
                $D_id = $emp_record['Designation_id'];
                // $J_id = $emp_record['J_id'];
    
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
                        <li class="nav-item"><a class="nav-link " href="viewemp.php">View Employee</a></li>
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
                    <h2 class="title">Under Arival To</h2>
                    <form id = "under_transfer" action="process/under_arivalto_process.php?E_id=<?php echo $id; ?>&J_id=<?php echo $J_id;  ?>&D_id=<?php echo $D_id ?>" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Name</p>
                                     <input class="input--style-1 bg-transparent" type="text" placeholder="Name" name="name" required="required" value="<?php  echo $name ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Father Name</p>
                                    <input class="input--style-1 bg-transparent" type="text" placeholder="Father Name" name="father_name" required="required" value="<?php  echo $father_name ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- to get the destination name  -->
                        <?php  
                            $designation_query= "SELECT * FROM `designation_list` WHERE D_id =$D_id";
                            $designation_records = mysqli_query($conn , $designation_query);
                            $designation_list = mysqli_fetch_assoc($designation_records)
                        ?>
                        <div class="input-group">
                            <p>Designation</p>
                            <input class="input--style-1 bg-transparent" type="text" placeholder="Father Name" name="Designation" required="required" value="<?php  echo $designation_list['Designation_name']; ?>" readonly>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Current Jail Name</p>
                                    <input class="input--style-1 bg-transparent" type="text" placeholder="Current Jail Name" name="current_name_of_jail" required="required" value="<?php  echo $current_jail_name['Name_of_jail']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Transfer Jail Name</p>
                                    <input class="input--style-1 bg-transparent" type="text" placeholder="Current Jail Name" name="current_name_of_jail" required="required" value="<?php  echo $transfer_jail_name['Name_of_jail']; ?>" readonly>
                                </div>
                            </div>
                        </div>

       
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group ">
                                    <p>Order Number</p>
                                    <input class="input--style-1" type="number" placeholder="order number" name="order_number"  value="<?php  echo $tranfer_order_no; ?>" readonly >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Order Date</p>
                                    <input class="input--style-1 p-2" type="date" placeholder="Order Date" name="order_date"  value="<?php  echo $tranfer_order_date; ?>" readonly >
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group ">
                                    <p>Release Number</p>
                                    <input class="input--style-1" type="number" placeholder="Release Number" name="release_number" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <p>Release Date</p>
                                    <input class="input--style-1 p-2" type="date" placeholder="Release Date" name="release_date" >
                                </div>
                            </div>
                        </div>
      
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Release Transfer</button>
                            
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






































