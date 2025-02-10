<?php



if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_SESSION['username'])){
        header('location: index.php');
        exit;
    }


    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    
//   email
if(!requireval($email)){
    $_SESSION['error'][]="email is require";
  }else if(!emailval($email)){
    $_SESSION['error'][]="shoud input email";
  }
  if(!requireval($password)){
    $_SESSION['error'][]="password is require";
 }
 if (isset($_SESSION['error'])) {
    header("location: " . $_SERVER["HTTP_REFERER"]);
    exit;
}
    $sql="SELECT * FROM users WHERE email ='$email'";
    $res=mysqli_query($con,$sql);

    try{
        
        $user =mysqli_fetch_assoc($res);
        if (password_verify($password,trim($user['password']))){    
            $_SESSION['username']=$user['name'];
            header("location: ./index.php");
        }else{
        $_SESSION['error'] = "faild log in";
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;

        }
    }catch(Exception $ex){
        $_SESSION['error'] = "faild log in";
     
        header("location: " . $_SERVER["HTTP_REFERER"]);
        exit;

    }





}