<?php 

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=trim($_POST['username']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);

    if(!requireval($name)){
        $_SESSION['error'][]="name is require";
     }else if(!minval($name,5)){
        $_SESSION['error'][]="name must be more than 5";
     }
     
     if(!requireval($password)){
        $_SESSION['error'][]="password is require";
     }
     
    //   email
     if(!requireval($email)){
        $_SESSION['error'][]="email is require";
      }else if(!emailval($email)){
        $_SESSION['error'][]="shoud input email";
      }
    // var_dump($_SESSION['error']);
        if (isset($_SESSION['error'])) {
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }



    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO users(`name`,`email`,`password`) VALUES('$name','$email','$hashedPassword')";


    try{
        $res=mysqli_query($con,$sql);
        if ($res){    
            $_SESSION['username']=$name;
            header("location: ./index.php");
        }else{
        $_SESSION['error'] = "faild regestration";
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;

        }
    }catch(Exception $ex){
        $_SESSION['error'] = "faild regestration";
     
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;

    }



}