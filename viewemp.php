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
	<title>View Employee |  Admin Panel | XYZ Corporation</title>
	
</head>
<body>
	<div class="top_header container-fluid px-5 pt-2 pb-1">
		<h1>Welcome to Central Prison DIKhan</h1>
	</div>

		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg nav_color  s py-3 " id="mainNav">
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand text-dark" href="#page-top">List of All Employee</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="aloginwel.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="addemp.php">Add Employee</a></li>
                        <li class="nav-item"><a class="nav-link active" href="viewemp.php">View Employee</a></li>
                        <li class="nav-item"><a class="nav-link" href="viewundertransfer.php">Under Transfer List</a></li>
                        <li class="nav-item"><a class="nav-link" href="empleave.php">Employee Leave</a></li>
                        <li class="nav-item"><a class="nav-link" href="alogin.html">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

	<div class="divider bg-rd"></div>


	<table class="table table-respansive table-hover table-bordered table-sm">
			<thead class="t_heading_bg">
				<tr>
					<th scope="col">P. NO</th>
					<th scope="col">Name with Parentage</th>
					<th scope="col">Designation</th>
					<th scope="col">Name of Jail</th>
					<th scope="col">CNIC</th>
					<th scope="col">Contact</th>
					<th scope="col">Address</th>
					<th scope="col">Date of Birth</th>
					<th scope="col">Qualification</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody class="table_font">
				<?php  
					$view_emp_query = "SELECT * , designation_list.Designation_name, list_of_jail.Name_of_jail FROM employee_records INNER JOIN designation_list ON employee_records.D_id = designation_list.D_id INNER JOIN list_of_jail ON employee_records.Jail_id=list_of_jail.J_id";

					$emp_result= mysqli_query($conn , $view_emp_query);
				
					while($r=mysqli_fetch_assoc($emp_result)){
						?>
						<tr>
							<td scope="row"><?php  echo $r['Personal_no'];  ?></td>
							<td><?php  echo $r['Name'];  ?> <b>S/O</b> <?php  echo $r['Father_name'];  ?></td>
							<td><?php  echo $r['Designation_name']; ?></td>
							<td><?php  echo $r['Name_of_jail']; ?></td>
							<td><?php  echo $r['Cnic'];  ?></td>
							<td><?php  echo $r['Contact'];  ?></td>
							<td><?php  echo $r['Address'];  ?></td>
							<td><?php  echo $r['Dob'];  ?></td>
							<td><?php  echo $r['Qualification'];  ?></td>
							<?php
							echo "<td>
									<a href=\"edit.php?id=$r[E_id]\">Edit</a> | 
									<a href=\"transfer.php?id=$r[E_id]\">Under Transfer to </a> | 
									<a href=\"delete.php?id=$r[E_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
								</td>"; ?>
						</tr>

						<?php
					}



				?>

			</tbody>


		</table>



	<table class="table caption-top  table-sm table-responsive">
		<caption>List of users</caption>
		<thead class="bg-rd-light">
			<tr>
				<th scope="col">P. NO</th>
				<th scope="col">Name with parentage</th>
				<th scope="col">Designation</th>
				<th scope="col">Date of Birth</th>
				<th scope="col">Contact</th>
				<th scope="col">CNIC</th>
				<th scope="col">Address</th>
				<th scope="col">Name of Jail</th>
				<th scope="col">Qualification</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// require_once ('process/dbh.php');
				// $sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

				//echo "$sql";
				// $result = mysqli_query($conn, $sql);

			?>
			<?php
					while ($employee = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$employee['id']."</td>";
						echo "<td>".$employee['firstName']." s/o ".$employee['lastName']."</td>";
						echo "<td>".$employee['dept']."</td>";
						echo "<td>".$employee['birthday']."</td>";
						echo "<td>".$employee['gender']."</td>";
						echo "<td>".$employee['contact']."</td>";
						echo "<td>".$employee['nid']."</td>";
						echo "<td>".$employee['address']."</td>";
						
						echo "<td>".$employee['degree']."</td>";
						
						
						echo "<td>
									<a href=\"edit.php?id=$employee[id]\">Edit</a> | 
									<a href=\"transfer.php?id=$employee[id]\">Under Transfer to </a> | 
									<a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
								</td>";


					}
				?>
		</tbody>
	</table>

		<table class=" table table-sm table-responsive">
			<tr>

				<th align = "center">Emp. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name with parentage</th>
				<th align = "center">Rank</th>
				<th align = "center">Date of Birth</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">NIC</th>
				<th align = "center">Address</th>
				<th align = "center">Name of Jail</th>
				<th align = "center">Qualification</th>
				
				
				
				<th align = "center">Action</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['firstName']." s/o ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
					echo "<td>".$employee['nid']."</td>";
					echo "<td>".$employee['address']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['degree']."</td>";
					
					
					echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"transfer.php?id=$employee[id]\">Under Transfer to </a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";


				}


			?>

		</table>
		
	
</body>
</html>