<?php

require_once ('dbh.php');

$name = $_POST['name'];
$father_name = $_POST['father_name'];

$Designation = $_POST['Designation'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$name_of_jail =$_POST['name_of_jail'];

$cnic = $_POST['cnic'];
$personal_no = $_POST['personal_no'];
$degree = $_POST['degree'];


//echo "$birthday";
// $files = $_FILES['file'];
// $filename = $files['name'];
// $filrerror = $files['error'];
// $filetemp = $files['tmp_name'];
// $fileext = explode('.', $filename);
// $filecheck = strtolower(end($fileext));
// $fileextstored = array('png' , 'jpg' , 'jpeg');

// echo $name."<br>";
// echo $father_name."<br>";
// echo $Designation."<br>";
// echo $birthday."<br>";
// echo $gender."<br>";
// echo $contact."<br>";
// echo $name_of_jail."<br>";

// echo $cnic."<br>";
// echo $personal_no."<br>";
// echo $degree."<br>";
// echo $email."<br>";

// insert querry
$emp_insert_query="INSERT INTO `employee_records` (`Personal_no`, `Cnic`, `Name`, `Father_name`, `D_id`, `Dob`, `Contact`, `Address`, `gender` , `Qualification`, `Jail_id`) VALUES ('$personal_no', '$cnic', '$name', '$father_name', '$Designation', '$birthday' , '$contact', '$address', '$gender', '$degree', '$name_of_jail')";

$result_emp_insert = mysqli_query($conn ,$emp_insert_query);

if(($result_emp_insert) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='../viewemp.php';
    </SCRIPT>");
    //header("Location: ..//aloginwel.php");
}
else{
    // echo ("<SCRIPT LANGUAGE='JavaScript'>
    // window.alert('Failed to Registere')
    // window.location.href='javascript:history.go(-1)';
    // </SCRIPT>");
}





// if(in_array($filecheck, $fileextstored)){

//     $destinationfile = 'images/'.$filename;
//     move_uploaded_file($filetemp, $destinationfile);

//     $sql = "INSERT INTO `employee`(`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`,  `address`, `dept`, `degree`, `pic`) VALUES ('','$firstname','$lastName','$email','1234','$birthday','$gender','$contact','$nid','$address','$dept','$degree','$destinationfile')";

// $result = mysqli_query($conn, $sql);

// $last_id = $conn->insert_id;

// $sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
// $salaryQ = mysqli_query($conn, $sqlS);
// $rank = mysqli_query($conn, "INSERT INTO `rank`(`eid`) VALUES ('$last_id')");

// if(($result) == 1){
    
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Succesfully Registered')
//     window.location.href='..//viewemp.php';
//     </SCRIPT>");
//     //header("Location: ..//aloginwel.php");
// }

// else{
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Failed to Registere')
//     window.location.href='javascript:history.go(-1)';
//     </SCRIPT>");
// }

// }

// else{

//       $sql = "INSERT INTO `employee`(`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`,  `address`, `dept`, `degree`, `pic`) VALUES ('','$firstname','$lastName','$email','1234','$birthday','$gender','$contact','$nid','$address','$dept','$degree','images/no.jpg')";

// $result = mysqli_query($conn, $sql);

// $last_id = $conn->insert_id;

// $sqlS = "INSERT INTO `salary`(`id`, `base`, `bonus`, `total`) VALUES ('$last_id','$salary',0,'$salary')";
// $salaryQ = mysqli_query($conn, $sqlS);
// $rank = mysqli_query($conn, "INSERT INTO `rank`(`eid`) VALUES ('$last_id')");

// if(($result) == 1){
    
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Succesfully Registered')
//     window.location.href='..//viewemp.php';
//     </SCRIPT>");
//     //header("Location: ..//aloginwel.php");
// }

// // else{
// //     echo ("<SCRIPT LANGUAGE='JavaScript'>
// //     window.alert('Failed to Registere')
// //     window.location.href='javascript:history.go(-1)';
// //     </SCRIPT>");
// // }
// }






// ?>