<?php


require_once './Db.Conn.php';



if(isset($_POST['submit'])){
    $company = $_POST['company'];
    $contactperson = $_POST['contactperson'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mainGroup = $_POST['Group'];
    $subGroup = $_POST['subGroup'];

    $addCustomerSql = "INSERT INTO `customers`( `company`, `contactp`, `email`, `phone`, `mainGroup`, `subGroup`) VALUES (
    :company , :contactp , :email , :phone , :mainGroup , :subGroup)";
    $addCustomer = $conn->prepare($addCustomerSql);
    $addCustomer->bindParam(':company', $company);
    $addCustomer->bindParam(':contactp', $contactperson);
    $addCustomer->bindParam(':email', $email);
    $addCustomer->bindParam(':phone', $phone);
    $addCustomer->bindParam(':mainGroup', $mainGroup);
    $addCustomer->bindParam(':subGroup', $subGroup);

    $addCustomer->execute();

    header("Location:../UserProfils/User.php");

    exit;
}







?>