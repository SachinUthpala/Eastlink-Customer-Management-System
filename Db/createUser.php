<?php






if(isset($_POST['submit'])){
    $company = $_POST['company'];
    $contactperson = $_POST['contactperson'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mainGroup = $_POST['Group'];
    $subGroup = $_POST['subGroup'];

    echo $company . ' ' . $email . ' ' . $phone . ' ' . $mainGroup . ' ' . $subGroup . ' ' ;
}







?>