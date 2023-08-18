<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "370project";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

?>
<html>
<head>
	<title>View Employee |  Admin Panel | XYZ Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>Welcome to Headquarter</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homered" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="viewundertransfer.php">Under Transfer List</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<body>
        <div class="container">
        	  <div class="row">
        	  	  <div class="col-md-12">
        	  	  	   <table class="table table-bordered table-hover">
        	  	  	   	  <thead class="bg-success">
        	  	  	   	  	   <tr>
                                    <th>EMP_ID</th>
        	  	  	   	  	   	    <th>Name</th>
        	  	  	   	  	   	    <th>Father Name</th>
        	  	  	   	  	   	    <th>DESIGNATION</th>
        	  	  	   	  	   	    <th>NAME OF JAIL</th>
        	  	  	   	  	   	    <th>UNDER TRANSFER TO</th>
        	  	  	   	  	   	    <th>ORDER NO</th>
        	  	  	   	  	   	    <th>ORDER DATE</th>
                                    <th>Actions</th>
        	  	  	   	  	   </tr>
        	  	  	   	  </thead>
        	  	  	   	  <tbody>
        	  	  	   	  	<?php 
        	  	  	   	  		$result= mysqli_query($conn,"SELECT * FROM transfer");
        	  	  	   	  		 while ($row = mysqli_fetch_array($result)) {?>
        	  	  	   	  	   <tr>
                                    <td><?php echo $row['t_id'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['e_name'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['e_fname'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['e_design'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['e_jailname'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['e_undertransfer'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['order_no'];?></td>
        	  	  	   	  	   	    <td><?php echo $row['order_date'];?></td>

                                    <td>
                                        <a href="delete.php?s_id=<?php echo $row['s_id'];?>">Delete</a> |
                                        <a href="edit.php?s_id=<?php echo $row['s_id'];?>">Edit</a>
                                    </td>
        	  	  	   	  	   </tr>
        	  	  	   	  	   <?php }?>
        	  	  	   	  </tbody>
        	  	  	   </table>
        	  	  </div>
        	  </div>
        </div>
</body>
</html>