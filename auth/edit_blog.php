<!DOCTYPE html>
<html lang="en">

<!-- Secure route for only admin -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["logged_in"])) {
    echo '<script> location.href = "./index.php" </script>';
}

if (!isset($_SESSION["is_admin"])) {
    echo '<script> location.href = "../user_dashboard.php" </script>';
}

?>

<!-- Get blog id -->
<?php
if (isset($_GET['id'])) {
    $blog_id = ($_GET['id']);
} else {
    $blog_id = 0;
}
?>

<?php include("./components/_head.php") ?>
<!-- Blog Information's -->
<?php
include_once("../app/_dbConnection.php");

$blogs = new Blogs();

$res = $blogs->getBlog($blog_id);

$blog = mysqli_fetch_assoc($res);

if ($res->num_rows == 0) {
    echo '<script> location.href = "./blogs.php" </script>';
} else {
    $blog_title = $blog['title'];
    $blog_content = $blog['content'];
    $blog_image = $blog['image'];
    $blog_author = $blog['author'];
    // var_dump($blog);
}

?>

<body>
    <div class="side-menu">
        <ul>
            <li><a href="./admin_dashboard.php"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></a></li>
            <li><a href="./users.php"><i class="fa-solid fa-users"></i><span>Users</span></a></li>
            <li><a href="./packages.php"><i class="fa-solid fa-cube"></i><span>Packages</span></a> </li>
            <li><a href="./blogs.php"><i class="fa-solid fa-cube"></i><span>Travel blogs</span></a> </li>
            <li><a href="./sales.php"><i class="fa-solid fa-money-bill-trend-up"></i><span>Sales</span></a> </li>
        </ul>
    </div>
    <div class="container">
        <?php include("./components/_header.php") ?>
        <div class="content">
            <form method="post" action="./services/_editBlog.php" class="new-package-form">
                <div class="form-inner">
                    <div class="input-group">
                        <label for="title">Blog Title</label>
                        <input required type="text" name="title" id="title" value="<?php echo $blog_title; ?>">
                    </div>
                    <div class="input-group">
                        <label for="content">Blog Content</label>
                        <textarea name="content" rows="5" id="content"><?php echo $blog_content; ?></textarea>
                    </div>
                    <div class="input-group">
                        <label for="image">Blog Image</label>
                        <input required type="text" name="image" id="image" value="<?php echo $blog_image; ?>">
                    </div>
                    <div class="input-group">
                        <label for="author">Blog Author</label>
                        <input required type="text" name="author" id="author" value="<?php echo $blog_author; ?>">
                    </div>
                    <div class="row" style="margin-top: 1rem">
                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                        <input type="submit" value="Submit" name="submit" class="btn" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    tinymce.init({
        selector: 'textarea#content',
        menubar: false,
        plugins: 'lists',
        toolbar: 'bold italic underline numlist bullist',
    });
</script>

</html>