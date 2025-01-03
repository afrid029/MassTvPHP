<?php

if (isset($_POST['logoupload'])) {
    include('./dbconnectivity.php');

    $targetDirectory = "../../public/upload/";

    // Get the file extension
    $imageFileType = strtolower(pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION));

    // Generate a unique file name using timestamp and a random number
    $timestamp = time(); // Current timestamp (seconds since Unix epoch)
    $randomNumber = rand(1000, 9999); // Random number to add some variability
    $targetFile = $targetDirectory . "logo_" . $timestamp . "_" . $randomNumber . "." . $imageFileType;

    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
        echo "The file has been uploaded successfully as: " . basename($targetFile);
    } else {
        $_SESSION['message'] = "Failed to upload Logo. Try again later!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        header('Location: /');
    }

    $timeStampId = time();
    $randomId = rand(1000, 99999);
    $ID = $timeStampId . $randomId;

    

    $query = "INSERT INTO logo (ID, image) VALUES ('$ID','$targetFile')";
    $result = mysqli_query($db, $query);
    if ($result) {
        $_SESSION['message'] = "Logo Uploaded Successfully!";
        $_SESSION['status'] = true;
        $_SESSION['fromAction'] = true;
        mysqli_close($db);
        header('Location: /');
    } else {
        $_SESSION['message'] = "Failed to upload Logo!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        mysqli_close($db);
        header('Location: /');
    }
} else {
    header('Location: /');
}
