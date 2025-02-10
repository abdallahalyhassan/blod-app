<?php



if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $blogUpdate = mysqli_fetch_assoc($res);
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
//   email
if(!requireval($title)){
    $_SESSION['error'][]="title is require";
}else if(!maxval($title,50)){
    $_SESSION['error'][]="content shoud be less than 50";
 }
  if(!minval($content,10)){
    $_SESSION['error'][]="content shoud be more than 10";
 }
 if (isset($_SESSION['error'])) {
    header("location: " . $_SERVER["HTTP_REFERER"]);
    exit;
}


    if (isset($_GET['id']) && isset($_FILES['img'])&& !empty($_FILES['img'] )) {
        if (isset($blogUpdate['img'])) {
            $img = $blogUpdate['img'];
            if (file_exists($img)) {
                unlink($img);
            }
        }
        $pathName = './assets/upload/' . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $pathName);
    } else {
        $pathName = isset($blogUpdate['img']) ? $blogUpdate['image'] : null;
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $sql = "UPDATE `posts` SET title = '$title', content = '$content', `img` = '$pathName' WHERE id = " . $_GET['id'];
        $_SESSION['success'] = "blog updated";
    } else {
        $sql = "INSERT INTO `posts` (`title`,`content`,`img`,`created_at`) values ('$title','$content','$pathName',NOW())";
        $_SESSION['success'] = "blog created";
    }
    
    
    
    
    
    
    mysqli_query($con, $sql);



    header("Location: ./index.php?page=add-blog ");

    exit;
}
