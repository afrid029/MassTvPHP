<?php include('./dbconnectivity.php');
if (isset($_POST['submit'])) {

    include('../Controllers/dbconnectivity.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $_SESSION['fromAction'] = true;
    if (mysqli_num_rows($result) > 0) {

        $_SESSION['isloggedin'] = true;
        $_SESSION['status'] = true;
        $_SESSION['message'] = "Admin Logged In Successfully!";

        header('Location: /');
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        $_SESSION['isloggedin'] = false;
        $_SESSION['status'] = false;
        header('Location: /');
    }
}else{
    header('Location: /');
}