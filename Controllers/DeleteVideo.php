
<?php 
    if(isset($_POST['delete'])){
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'mydb');
        $id = $_POST['id'];
        $image = $_POST['image'];
        $query = "DELETE FROM videos WHERE ID = '$id'";
        $result = mysqli_query($db, $query);
        if($result){
            unlink($image);
            $_SESSION['message'] = "Video Deleted Successfully!";
            $_SESSION['status'] = true;
            $_SESSION['fromAction'] = true;
            $db->close();
            header('Location: /');
        }else{
            $_SESSION['message'] = "Failed to delete video!";
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            $db->close();
            header('Location: /');
        }
    }
?>