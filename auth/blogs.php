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

<?php include("./components/_head.php") ?>
<?php include_once("./services/_blogs.php") ?>

<body>
    <div class="side-menu">
        <ul>
            <li><a href="./admin_dashboard.php"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></a></li>
            <li><a href="./users.php"><i class="fa-solid fa-users"></i><span>Users</span></a></li>
            <li><a href="./packages.php"><i class="fa-solid fa-cube"></i><span>Packages</span></a> </li>
            <li class="active"><a href="./blogs.php"><i class="fa-solid fa-cube"></i><span>Travel blogs</span></a> </li>
            <li><a href="./sales.php"><i class="fa-solid fa-money-bill-trend-up"></i><span>Sales</span></a> </li>
        </ul>
    </div>
    <div class="container">
        <?php include("./components/_header.php") ?>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo $allBlogsCount ?></h1>
                        <h3>Total Blog(s)</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-cube"></i>
                    </div>
                </div>
                <a href="./new_blog.php">
                    <div class="card add-package">
                        <div class="box">
                            Add New Blog 
                        </div>
                    </div>
                </a>
            </div>
            <div class="content-2">
                <div class="blogs-container">
                    <?php
                    if ($allBlogsCount == 0) {
                        echo "<h1>No Blog Found...</h1>";
                    } else {
                        while ($row = mysqli_fetch_assoc($blogs)) {
                            echo "
                            <div class='package-card' style='width: 300px;'>
                                <div class='package-card-img'>
                                    <img src=".$row['image']." alt='blog image'
                                        style='width: 100%; height: 200px; object-fit: cover;' /
                                    >
                                </div>
                                <div class='package-card-content'>
                                    <h2 style='text-overflow: ellipsis; width:100%; overflow:hidden; white-space:nowrap;'>" . $row['title'] . "</h2>
                                    <div class='package-card-footer' style='margin-top: 10px;'>
                                        <a href='./edit_blog.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                                        <a href='./services/_deleteBlog.php?id=" . $row['id'] . "' class='btn'>Delete</a>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    }
                    ?>
                </div>
    
            </div>
        </div>
    </div>
   
    
</body>

</html>
