<?php
// Include your database connection file
// Include your database connection file
require_once './Db.Conn.php';
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['Passeword'];
    $admin = (int)$_POST['adminAccess'];
    
    // Debugging output
    echo $username . " " . $email . " " . $password . " " . $admin;

    // Prepare an SQL statement to insert the data
    $sql = "INSERT INTO `user` (`username`, `usermail`, `userpassword`, `adminAccess`) VALUES (:username, :usermail, :userpassword, :adminAccess)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to the SQL query
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':usermail', $email);
    $stmt->bindParam(':userpassword', $password);
    $stmt->bindParam(':adminAccess', $admin);

    try {
        // Execute the SQL statement
        $stmt->execute();
        $_SESSION['useraadded'] = 1;
        echo "User added successfully!";
        header("Location:../UserProfils/User.php");
    } catch (PDOException $e) {
        // Catch any PDO exceptions and display the error message
        echo "Error: " . $e->getMessage();
        $_SESSION['usernotadded'] = 1;
        header("Location:../UserProfils/User.php");
    }
}

?>