<?php

require_once ('dbh.php');

$firstname = $_POST['firstName'];
$lastName = $_POST['lastName'];
$design = $_POST['desin'];
$nameofjail = $_POST['nameofjail'];
$undertransferto = $_POST['undertransferto'];
$order_no = $_POST['order_no'];
$order_date = $_POST['order_date'];
// $dept = $_POST['dept'];
// $degree = $_POST['degree'];
// $salary = $_POST['salary'];
// $birthday =$_POST['birthday'];
// //echo "$birthday";
// $files = $_FILES['file'];
// $filename = $files['name'];
// $filrerror = $files['error'];
// $filetemp = $files['tmp_name'];
// $fileext = explode('.', $filename);
// $filecheck = strtolower(end($fileext));
// $fileextstored = array('png' , 'jpg' , 'jpeg');

// if(in_array($filecheck, $fileextstored)){

//     $destinationfile = 'images/'.$filename;
//     move_uploaded_file($filetemp, $destinationfile);

    $sql = "INSERT INTO `transfer`(`e_name`, `e_fname`, `e_design`, `e_jailname`, `e_undertransfer`, `order_no`, `order_date`) VALUES ('$firstname','$lastName','$design','$nameofjail','$undertransferto','$order_no','$order_date')";

$result = mysqli_query($conn, $sql);

if(($result) == 1){
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewundertransfer.php';
    </SCRIPT>");
    //header("Location: ..//aloginwel.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Registere')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}



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

// else{
//     echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Failed to Registere')
//     window.location.href='javascript:history.go(-1)';
//     </SCRIPT>");
// // }
// }






?>