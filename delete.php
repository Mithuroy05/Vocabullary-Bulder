<?php
include_once "config.php";

$deleteid = $_GET['id'] ?? '';
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$connection){
    throw new Exception("Error Processing Request");
    
}
        
if($deleteid){
        $query = "DELETE FROM words WHERE id= {$deleteid} LIMIT 1";
        mysqli_query($connection, $query);
        header('Location: words.php');

    }


