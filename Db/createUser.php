<?php

require_once './Db.Conn.php';
session_start();
$date = date("Y/m/d");
echo $date;

if (isset($_POST['submit'])) {
    $createdBy = $_POST['user'];
    $company = $_POST['company'];
    $contactperson = $_POST['contactperson'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];
    $mainGroup = $_POST['Group'];
    $subGroup = $_POST['subGroup'];
    $position = $_POST['position'];

    try {
        // Check if the customer already exists
        $extSql = "SELECT * FROM `customers` WHERE company = :company OR contactp = :contactp";
        $extStmt = $conn->prepare($extSql);
        $extStmt->bindParam(':company', $company);
        $extStmt->bindParam(':contactp', $contactperson);
        $extStmt->execute();

        if ($extStmt->rowCount() > 0) {
            $_SESSION['UserNotCreated'] = 1;
            header("Location:../UserProfils/User.php");
            exit;
        }

        // Insert new customer
        $addCustomerSql = "INSERT INTO `customers`( `company`, `contactp`, `position`, `email`, `phone`,`whatsapp`, `mainGroup`, `subGroup`, `createdBy`) VALUES (
            :company, :contactp, :position ,:email, :phone, :whatsapp , :mainGroup, :subGroup, :createdBy)";
        $addCustomer = $conn->prepare($addCustomerSql);

        $addCustomer->bindParam(':company', $company);
        $addCustomer->bindParam(':contactp', $contactperson);
        $addCustomer->bindParam(':email', $email);
        $addCustomer->bindParam(':phone', $phone);
        $addCustomer->bindParam(':whatsapp', $whatsapp);
        $addCustomer->bindParam(':mainGroup', $mainGroup);
        $addCustomer->bindParam(':subGroup', $subGroup);
        $addCustomer->bindParam(':createdBy', $createdBy);
        $addCustomer->bindParam(':position' , $position);

        $addCustomer->execute();

        $_SESSION['UserCreated'] = 1;
        header("Location:../UserProfils/User.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    exit;
}
?>
