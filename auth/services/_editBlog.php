<?php

include_once("../../app/_dbConnection.php");

if(isset($_POST['blog_id']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['author']) && isset($_POST['image'])){

    $blog_id = $_POST['blog_id'];
    $blog_title = $_POST['title'];
    $blog_content = $_POST['content'];
    $blog_author = $_POST['author'];
    $blog_image = $_POST['image'];

    $blogsInstance = new Blogs();

    $blogsInstance->updateBlog($blog_id, $blog_title, $blog_content, $blog_image, $blog_author);

    echo "<script> location.href = '../blogs.php' </script>";
}
?>