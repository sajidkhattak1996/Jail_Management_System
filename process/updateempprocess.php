<?php


require_once ('dbh.php');
//echo "$sql";

// if(isset($_POST['update']))
// {

    $id_original = (isset($_GET['id']) ? $_GET['id'] : '');


    $name_update = $_POST['name'];
    $father_name_update = $_POST['father_name'];

    $designation_id_update = $_POST['Designation'];
    $birthday_update = $_POST['birthday'];
    $gender_update = $_POST['gender'];
    $contact_update = $_POST['contact'];
    $address_update = $_POST['address'];
    $name_of_jail_id_update =$_POST['name_of_jail'];

    $cnic_update = $_POST['cnic'];
    $personal_no_update = $_POST['personal_no'];
    $degree_update = $_POST['degree'];


    $emp_update_query ="UPDATE `employee_records` SET `Personal_no`='$personal_no_update',`Cnic`='$cnic_update',`Name`='$name_update',`Father_name`='$father_name_update',`D_id`='$designation_id_update',`Dob`='$birthday_update',`Contact`='$contact_update',`Address`='$address_update',`gender`='$gender_update',`Qualification`='$degree_update',`Jail_id`='$name_of_jail_id_update' WHERE E_id=$id_original";

        
    $update_emp_insert_result = mysqli_query($conn ,$emp_update_query);

    if(($update_emp_insert_result) == 1){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Updated')
        window.location.href='../viewemp.php';
        </SCRIPT>");



    }else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Updated Failed Try Again!')
        window.location.href='viewemp.php';
        </SCRIPT>");


        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='../viewemp.php';
        </SCRIPT>");
      
  
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Failed to Registere')
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");

    }
?>