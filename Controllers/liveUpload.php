<?php
    
    if (isset($_POST['liveupload'])) {
        include('./dbconnectivity.php');
        
        $url = $_POST['url'];
        $query = "INSERT INTO live (stream) VALUES ('$url')";
        $result = mysqli_query($db, $query);
        if ($result) {
            $_SESSION['message'] = "Stream Uploaded Successfully!";
            $_SESSION['status'] = true;
            $_SESSION['fromAction'] = true;
            mysqli_close($db);
            header('Location: /');
        } else {
            $_SESSION['message'] = "Failed to upload stream!";
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            mysqli_close($db);
            header('Location: /');
        }
    } else {
        header('Location: /');
    }
?>