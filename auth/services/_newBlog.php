<?php
include_once("../../app/_dbConnection.php");

if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['image']) && isset($_POST['author'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];
    $author = $_POST['author'];

    $blogsInstance = new Blogs();

    $blogsInstance->createBlog($title, $content, $image, $author);

    echo "<script> location.href = '../blogs.php' </script>";
}