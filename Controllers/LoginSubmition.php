<?php
if (isset($_POST['submit'])) {
    include('./dbconnectivity.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $_SESSION['fromAction'] = true;
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($db);

        $iv = openssl_random_pseudo_bytes(16);  // AES block size is 16 bytes

        // Encrypt the email using AES-256-CBC encryption
        $key = 'a1b2c3d4e5f67890123456789abcdef0123456789abcdef0123456789abcdef';
        $encryptedEmail = openssl_encrypt($row['email'], 'aes-256-cbc', $key, 0, $iv);
    
        // Combine the IV with the encrypted email to store both together
        $encryptedEmailWithIv = base64_encode($iv . $encryptedEmail);

        setcookie('user', $encryptedEmailWithIv, time() + 3600, '/');

        $_SESSION['isloggedin'] = true;
        $_SESSION['status'] = true;
        $_SESSION['message'] = "Admin Logged In Successfully!";

        header('Location: /');
    }elseif (mysqli_num_rows($result) > 1) {
        $_SESSION['message'] = "This email has multiple records in database!";
        $_SESSION['isloggedin'] = false;
        $_SESSION['status'] = false;
        mysqli_close($db);
        header('Location: /');
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        $_SESSION['isloggedin'] = false;
        $_SESSION['status'] = false;
        mysqli_close($db);
        header('Location: /');
    }
} else {
    header('Location: /');
}
