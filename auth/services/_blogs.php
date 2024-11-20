<?php
include_once("../app/_dbConnection.php");

$blogsInstance = new Blogs();
$blogs = $blogsInstance->getBlogs();
$allBlogsCount = $blogs->num_rows;