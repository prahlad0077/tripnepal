<?php
include_once("../../app/_dbConnection.php");

if (isset($_GET['id'])) {
    $blog_id = ($_GET['id']);
    $blogsInstance = new Blogs();
    $blogsInstance->deleteBlog($blog_id);
    echo "<script> location.href = '../blogs.php' </script>";
}