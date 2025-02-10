<?php

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    
    $sql="SELECT * FROM `posts` WHERE id=$id ";
    $res=mysqli_query($con,$sql);
    $blogUpdate=mysqli_fetch_assoc($res);

    if($blogUpdate && isset($blogUpdate['img'])&& file_exists($blogUpdate['img']) )
{
    unlink($blogUpdate['img']);
}

    $sql="DELETE FROM `posts` WHERE id=$id ";
    mysqli_query($con, $sql);
    $_SESSION['success'] = "Deleted";

    header("Location: ./index.php?page=add-blog ");
    exit;
}


