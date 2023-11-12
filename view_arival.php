<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="styleview.css"> -->
	<?php
		require_once ('process/dbh.php');
		$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

		//echo "$sql";
		$result = mysqli_query($conn, $sql);

		include 'process/header.html';  
	?>
	<title>Under Transfer List</title>
	
</head>
<body>
	<div class="top_header container-fluid px-5 pt-2 pb-1">
		<h1>Welcome to Central Prison DIKhan</h1>
	</div>

		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg nav_color  s py-3 " id="mainNav">
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand text-dark" href="#page-top">Under Transfer List</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="aloginwel.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="addemp.php">Add Employee</a></li>
                        <li class="nav-item"><a class="nav-link " href="viewemp.php">View Employee</a></li>
                        <li class="nav-item"><a class="nav-link active" href="viewundertransfer.php">Under Transfer</a></li>
                        <li class="nav-item"><a class="nav-link active" href="view_arival.php">Under Arival</a></li>
                        <li class="nav-item"><a class="nav-link" href="alogin.html">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

	<div class="divider bg-rd"></div>


	<table class="table table-respansive table-hover table-bordered table-sm">
			<thead class="t_heading_bg">
				<tr>
					<th scope="col" title="Serial Number">S. NO</th>
					<th scope="col" title="Name with Parent Name">Name/Parentage</th>
					<th scope="col">Designation</th>
					<th scope="col" title="Current Jail">C_Jail</th>
					<th scope="col" title="Transfer Jail">T_Jail</th>
					<th scope="col">Order No</th>
					<th scope="col">Order Date</th>
					<th scope="col">Release Status</th>
					<th scope="col" title="Release Number">R_No</th>
					<th scope="col" title="Release Date">R_Date</th>
					<th scope="col" title="Action">Action</th>
				</tr>
			</thead>
			<tbody class="table_font">
				<?php  
					$view_emp_query = "SELECT employee_records.Name,employee_records.Father_name,designation_list.Designation_name, list_of_jail.Name_of_jail, under_transfer_list.*
					FROM under_transfer_list
					INNER JOIN employee_records ON under_transfer_list.E_id=employee_records.E_id
					INNER JOIN designation_list ON under_transfer_list.Designation_id=designation_list.D_id
					INNER JOIN list_of_jail ON under_transfer_list.current_jail_id=list_of_jail.J_id";


					$emp_result= mysqli_query($conn , $view_emp_query);

					if (mysqli_num_rows($emp_result)>0){
						while($r=mysqli_fetch_assoc($emp_result)){
							$current_jail_id=$r['current_jail_id'];
							$name_of_jail_query="SELECT Name_of_jail FROM list_of_jail WHERE J_id='$current_jail_id'";
							$name_result=mysqli_query($conn ,$name_of_jail_query);
							$current_jail_name=mysqli_fetch_assoc($name_result);
	
	
							$transfer_jail_id=$r['transfer_jail_id'];
							$name_of_transfer_jail_query="SELECT Name_of_jail FROM list_of_jail WHERE J_id='$transfer_jail_id'";
							$name_trasnfer_result=mysqli_query($conn ,$name_of_transfer_jail_query);
							$transfer_jail_name=mysqli_fetch_assoc($name_trasnfer_result);
	
	
	
							?>
							<tr>
								<td scope="row"><?php  echo $r['S_no'];  ?></td>
								<td><?php  echo $r['Name'];  ?> <b>S/O</b> <?php  echo $r['Father_name'];  ?></td>
								<td><?php  echo $r['Designation_name']; ?></td>
								<td><?php  echo $current_jail_name['Name_of_jail'] ?></td>
								<td><?php  echo $transfer_jail_name['Name_of_jail'] ?></td>
								<td><?php  echo $r['Transfer_order_no'];  ?></td>
								<td><?php  echo $r['Transfer_order_date'];  ?></td>
								<td><?php  echo $r['Relieved _status'];  ?></td>
								<td><?php  echo $r['Relieved _number'];  ?></td>
								<td><?php  echo $r['Relieved _date'];  ?></td>
							
								<?php
								echo "<td>
										<a href=\"edit.php?id=$r[E_id]\">Edit</a> | 
										<a href=\"transfer.php?id=$r[E_id]\">Under Arival to </a> | 
										<a href=\"delete.php?id=$r[E_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
									</td>"; ?>
							</tr>
	
							<?php
						}

					}else{
						?>
						<td colspan=14 class="m-0 p-0">
							<div class="alert alert-warning m-0 text-center" role="alert">
								<b>No Record Founds!</b>
							</div>
						</td>
						<?php
					}




				?>

			</tbody>


		</table>

</body>
</html>