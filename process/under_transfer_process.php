<?php


require_once ('dbh.php');
//echo "$sql";

// if(isset($_POST['update']))
// {

if(isset($_GET['E_id']) & isset($_GET['J_id']) & isset($_GET['D_id'])  ){
    // echo $_GET['E_id'];

    // $id_original = (isset($_GET['id']) ? $_GET['id'] : '');

    $employee_id = $_GET['E_id'];
    $jail_id = $_GET['J_id'];
    $designation_id = $_GET['D_id'];


// echo $_POST['name'];
// echo $_POST['father_name'];



    $name = $_POST['name'];
    $father_name = $_POST['father_name'];

    $designation_name = $_POST['Designation'];
    // $birthday_update = $_POST['birthday'];
    // $gender_update = $_POST['gender'];
    // $contact_update = $_POST['contact'];
    // $address_update = $_POST['address'];
    $current_name_of_jail =$_POST['current_name_of_jail'];

    // $cnic_update = $_POST['cnic'];
    // $personal_no_update = $_POST['personal_no'];
    // $degree_update = $_POST['degree'];

    //Below are the Data of Under Tranfer 
    $under_transfer_jail = $_POST['under_transfer_name_of_jail'];
    $order_no = $_POST['order_number'];
    $order_date = $_POST['order_date'];


    $under_transfer_query = "INSERT INTO `under_transfer_list`(`E_id`, `J_id`, `Name`, `Father_name`, `D_id`, `Transfer_order_no`, `Transfer_order_date`) VALUES ('$employee_id', '$jail_id', '$name', '$father_name' ,'$designation_id', '$order_no', '$order_date')";

  
    $under_transfer_result = mysqli_query($conn ,$under_transfer_query);

    if(($under_transfer_result) == 1){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Updated')
        window.location.href='../viewundertransfer.php';
        </SCRIPT>");

    }else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Updated Failed Try Again!')
        window.location.href='viewemp.php';
        </SCRIPT>");


    }



}
else {
    echo "<script> alert('There is problem Please Try Again!') </script>";
}


?>