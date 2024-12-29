<?php
    include('./dbconnectivity.php');
    if (isset($_POST['liveupload'])) {
        
        $url = $_POST['url'];
        $query = "INSERT INTO live (stream) VALUES ('$url')";
        $result = mysqli_query($db, $query);
        if ($result) {
            $_SESSION['message'] = "Video Uploaded Successfully!";
            $_SESSION['status'] = true;
            $_SESSION['fromAction'] = true;
            header('Location: /');
        } else {
            $_SESSION['message'] = "Failed to upload video!";
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            header('Location: /');
        }
    } else {
        header('Location: /');
    }
?>