<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <?php include_once './app/_dbConnection.php' ?>
    <title>TripNepal - Travel blog</title>
    <style>
.container {
    display: flex;
    flex-direction: column;
    max-width: 1600px;
    margin: 8px auto;
    padding: 0 8px;
  }
  .blog_content{
    font-size: 1.1rem;
    line-height: 1.6;
    padding: 10px 0;
  }
  .author_card{
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    padding: 10px;
    border: 1px solid #333;
    border-radius: 5px;
    width: fit-content;
  }
  h1 {
    margin-top: 0;
  }
  p {
    margin-bottom: 10px;
  }
  img {
    max-width: 100%;
    height: auto;
  }
</style>
</head>
<?php include './components/_head.php' ?>
<body>
    <nav id='navBar' class='navbar-white'>
        <a href='./index.php' class='logo'>
        <img src="./assets/logo.png" alt="tripnepal" style="width: 10rem;"/>
        </a>
        <ul class='nav-links'>
            <li><a href='./packages.php'>Packages</a></li>
            <li><a href='./blogs.php'>Travel blogs</a></li>
        </ul>
        <?php include("./components/_navBtns.php") ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
    $blogId = $_GET['id'];

    $blogs = new Blogs();
    $res = $blogs->getBlog($blogId);

    $blog = mysqli_fetch_assoc($res);
    echo '<div class="container">';

        echo '<h1>' . $blog['title'] . '</h1>';
        echo '<img src="' . $blog['image'] . '" alt="Blog Image">';
        echo '<p class="blog_content">' . $blog['content'] . '</p>';
        echo '<p class="author_card">Author: ' . $blog['author'] . '</p>';
        echo '</div>';

        include "./components/_footer.php";


        include "./components/_js.php" ;
  
} else {
header('Location: ./blogs.php');
}
   
?>
</body>

</html>