<?php
// Include your database connection file
require_once './Db.Conn.php';
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adminAccess = $_POST['adminAccess'];

    // Prepare an SQL statement to insert the data
    $sql = "INSERT INTO users (username, email, password, adminAccess) VALUES (:username, :email, :password, :adminAccess)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password ); // Hash the password before storing it
    $stmt->bindParam(':adminAccess', $adminAccess);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        echo "User added successfully!";
        $_SESSION['UserAdded'] = 1  ;
        header("Location: ../UserProfils/User.php");
    } else {
        // Redirect to an error page or display an error message
        echo "Error adding user.";
        $_SESSION['UserAddednot'] = 1  ;
        header("Location: ../UserProfils/User.php");
    }
} else {
    // Redirect to the form page if the form is not submitted correctly
    $_SESSION['UserAddednot'] = 1  ;
    header("Location: ../UserProfils/User.php");
    exit;
}
?>