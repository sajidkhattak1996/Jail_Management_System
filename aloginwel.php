<?php 
require_once ('process/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Admin Panel | XYZ Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="css/styles.css" rel="stylesheet" />
	<link href="css/mystyle.css" rel="stylesheet" />
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
                        <li class="nav-item"><a class="nav-link" href="viewemp.php">View Employee</a></li>
                        <li class="nav-item"><a class="nav-link" href="viewundertransfer.php">Under Transfer List</a></li>
                        <li class="nav-item"><a class="nav-link" href="alogin.html">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	
	<!-- <header>
		<nav>
			<h1>Welcome to Central Prison DIKhan</h1>
			<ul id="navli">
				<li><a class="homered" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="viewundertransfer.php">Under Transfer List</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header> -->
	 
	<!-- <div class="divider"></div> -->
	<div id="divimg">
		<!-- <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Dashboard </h2> -->

	<div class="table_holder container-fluid px-0">
		<table class="table ">
			<thead class="bg-rd-light">
				<tr>
					<th>Seq.</th>
					<th>Personal No</th>
					<th>Name</th>
					<th>Points</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$seq = 1;
					while ($employee = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$seq."</td>";
						echo "<td>".$employee['id']."</td>";
						
						echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
						
						echo "<td>".$employee['points']."</td>";
						
						echo "</tr>";

						$seq+=1;
					}
				?>
			</tbody>
		</table>
	</div>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
		</div>

		
	</div>
</body>
</html>