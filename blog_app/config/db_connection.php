<?php 
try{
    $con=mysqli_connect('localhost',"root","",'blogs');

    if(!$con){
        header("location: maintains.php");
        exit;
    }

}catch(Exception $ex){
    header("location: view/maintenance.php");
    exit;

}
