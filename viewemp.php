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
                <a class="navbar-brand text-dark" href="#page-top">Empolyee Dashboard</a>
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