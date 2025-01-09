<?php
session_start();
try {
    $db = mysqli_connect('localhost', 'root', '', 'mydb');
    if (!$db) {
        throw new Exception("Database connection failed");
    }
} catch (Exception $er) {
    //echo $er->getMessage();
    $_SESSION['error'] = $er->getMessage();
    header('Location: /error');
}

?>

<!-- Prod
DB_USER=massvbsx_masstvadmin
DB_PASSWORD=zqZ)OKJEHcai
DB_NAME=massvbsx_massTvSql 

$db = mysqli_connect('localhost', 'massvbsx_masstvadmin', 'zqZ)OKJEHcai', 'massvbsx_massTvSql');
-->



<!-- 
Test
$db = mysqli_connect('localhost', 'massvbsx_masstvadmin_test', 'z?+KG!FN@IVo', 'massvbsx_massTvSql_test');

-->