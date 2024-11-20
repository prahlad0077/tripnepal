<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <?php include_once './app/_dbConnection.php' ?>
    <title>TripNepal - Travel blogs</title>
</head>
<?php include './components/_head.php' ?>
<body>
    <nav id='navBar' class='navbar-white'>
        <a href='./index.php' class='logo'>
        <img src="./assets/logo.png" alt="tripnepal" style="width: 10rem;"/>
        </a>
        <ul class='nav-links'>
            <li><a href='./packages.php'>Packages</a></li>
            <li><a href='./blogs.php' class='active'>Travel blogs</a></li>
        </ul>
        <?php include("./components/_navBtns.php") ?>
    </nav>

      <div style="max-width:1200px; margin:auto; padding:20px 0;">

    <?php
        $blogs = new Blogs();
        $blogs = $blogs->getBlogs(3);
        ?>
        <h1>Latest Travel blogs</h1>
        <div class="stories">
            <?php
            foreach ($blogs as $blog) {
                echo "<div class='travellers-card'>
                <a href='./blog.php?id=" . $blog['id'] . "'>
                    <img src='" . $blog['image'] . "'>
                    <p><div>" . $blog['title'] . "</div></p>
                </a>
            </div>";
            }
            ?>
            </div>
          </div>
    <?php include "./components/_footer.php" ?>


    <?php include "./components/_js.php" ?>

</body>

</html>