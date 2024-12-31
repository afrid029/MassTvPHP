<?php

if (isset($_POST['videoupload'])) {
    include('./dbconnectivity.php');
    $title = $_POST['title'];
    $url = $_POST['videourl'];

    $targetDirectory = "../../public/upload/";

    // Get the file extension
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Generate a unique file name using timestamp and a random number
    $timestamp = time(); // Current timestamp (seconds since Unix epoch)
    $randomNumber = rand(1000, 9999); // Random number to add some variability
    $targetFile = $targetDirectory . $timestamp . "_" . $randomNumber . "." . $imageFileType;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file has been uploaded successfully as: " . basename($targetFile);
    } else {
        $_SESSION['message'] = "Failed to upload thumbnail. Try again later!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        header('Location: /');
    }

    $timeStampId = time();
    $randomId = rand(1000, 99999);
    $ID = $timeStampId . $randomId;

    $query = "INSERT INTO videos (title, url, ID, image) VALUES ('$title', '$url', '$ID','$targetFile')";
    $result = mysqli_query($db, $query);
    if ($result) {
        $_SESSION['message'] = "Video Uploaded Successfully!";
        $_SESSION['status'] = true;
        $_SESSION['fromAction'] = true;
        $db->close();
        header('Location: /');
    } else {
        $_SESSION['message'] = "Failed to upload video!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        $db->close();
        header('Location: /');
    }
} else {
    header('Location: /');
}
