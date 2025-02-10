<?php

function successmassege(){
    if (!empty($_SESSION['success']))
    {
   echo "<div class='alert alert-success text-center' role='alert'>{$_SESSION['success']}</div>";
   unset($_SESSION['success']);
    }
}

function errormassage(){
   
    
    if(isset($_SESSION['error'])){
        foreach($_SESSION['error'] as $error)
         {   echo "<div class='alert alert-danger text-center' role='alert'>{$error}</div>"."<br>";
        } 
    }
        unset($_SESSION["error"]);

}