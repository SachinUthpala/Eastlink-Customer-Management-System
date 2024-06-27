<?php

require_once './Db.Conn.php';

if(isset($_POST['submitUser'])){
    echo "submit";

    $email = $_POST['email'];
    $password = $_POST['pass'];

    if(!$email || !$password){
        $_SESSION['credition_null'] = 1;
        header("Location: ../index.html");
    }


    $sql_email = "SELECT * FROM `user` WHERE usermail = :usermail";

    try {
        $result = $conn->prepare($sql_email);
        // Bind the value of userMail to the placeholder
        $result->bindParam(':usermail', $email);
        $result->execute();

        if($result->rowCount() >0){
            $row = $result -> fetch(PDO::FETCH_ASSOC);
            $userPass = $row['userpassword'];
            $_SESSION['Admin'] = $row['userAccess'];

            if($password == $userPass){
                $_SESSION['login sucessfull'] = 1;
                header("Location: ../UserProfils/User.html");
            }else{
                $_SESSION['wrong_pass'] = 1;
                header("Location: ../index.html");
            }
        }else{
            $_SESSION['wrong_email'] = 1;
            header("Location: ../index.html");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
    


