<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './app/_dbConnection.php' ?>
    <?php include "./components/_head.php" ?>
    <title>TripNepal</title>
</head>

<body>
    <div class="header">
        <nav id="navBar">
            <a href="./index.php" class="logo">
            <img src="./assets/logo-white.png" alt="tripnepal" style="width: 10rem;"/>
        </a>
            <ul class="nav-links">
                <li><a href="./packages.php">Packages</a></li>
                <li><a href="./blogs.php">Travel blogs</a></li>
            </ul>
            <?php include("./components/_navBtns.php") ?>
        </nav>
        <div class="container hero">
            <h1>Travel Nepal Like Never Before</h1>
            <div class="search-bar">
                <form method="post" id="search_form">
                    <div class="location-input">
                        <label style="margin-bottom:4px;">Location</label>
                        <input required type="text" id="location" placeholder="Where are you going?">
                    </div>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>


    <!-- ---------exclusives------------ -->
    <div class="container">
        <?php
        $packages = new Packages();
        $res = $packages->getExclusivePackages();
        if ($res->num_rows > 0) {
            echo "<h2 class='sub-title'>Exclusive Packages</h2>
            <div class='exclusives'>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<a class='exclusive_link' href='./package.php?id=" . $row['package_id'] . "'>
                <div>
                <div>
                <img src='" . $row['master_image'] . "'>
               
               
            </div>
            </div>
            <div class='exclusive_div'>
            <span>
            <h3>" . $row['package_name'] . "</h3>
            <p>Starts @ Rs. " . $row['package_price'] . " </p>
        </span>
            </div>
            </a>
            ";
            }
            echo "</div>";
        }
        ?>
        <!-- -------------------Trending Places------------- -->

        <h2 class="sub-title">Trending Places in Nepal</h2>
        <div class="trending">
            <div>
            <a href="/tripnepal/packages.php?loc=Mount Everest"><img src="https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcSaD8MQXhfdj36aBRxsCJxMWurXX4ORwwrm28kg4Ub4StkycAlNle7ShRGma95M5dOgumC2iEg-f82BMpZOwtWS4nvNbCgQZx62kEL7JN4"></a>
                <h3><a href="/tripnepal/packages.php?loc=Mount Everest">Mount Everest</a></h3>
            </div>
            <div>
            <a href="/tripnepal/packages.php?loc=Pokhara"><img src="https://lh5.googleusercontent.com/p/AF1QipNdu5OF1YucfXVyRjuv12dExGX_RHewGeo0oeEE=w675-h390-n-k-no"></a>
                <h3><a href="/tripnepal/packages.php?loc=Pokhara">Pokhara</a></h3>
            </div>
            <div>
            <a href="/tripnepal/packages.php?loc=Lumbini"><img src="https://upload.wikimedia.org/wikipedia/commons/1/18/BRP_Lumbini_Mayadevi_temple.jpg"></a>
                <h3><a href="/tripnepal/packages.php?loc=Lumbini">Lumbini</a></h3>
            </div>
            <div>
            <a href="/tripnepal/packages.php?loc=Chitwan National Park"><img src="https://www.andbeyond.com/wp-content/uploads/sites/5/indian-elephant-chitwan-nepal.jpg"></a>
                <h3><a href="/tripnepal/packages.php?loc=Chitwan National Park">Chitwan National Park</a></h3>
            </div>
        </div>



        <!-- ---------------call to action----------- -->
        <div class="cta">
            <h3>Awesome Packages <br> For you and your friends/family.</h3>
            <p>Great combo with unbeatable prices <br> transport, accomodation & food all inclusive.</p>
            <a href="./packages.php" class="cta-btn">Book your first tour now!</a>
        </div>

        <!-- ==============Travellers Stories============== -->

        <h2 class="sub-title">Travel blogs</h2>
        <?php
        $blogs = new Blogs();
        $blogs = $blogs->getBlogs(3);
        ?>
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
        <a href="./blogs.php" class="Start-btn">Go to travel blogs</a>
    </div>
    <!-- ===============footer================ -->
    <?php include "./components/_footer.php" ?>
    <?php include "./components/_js.php" ?>
    <script>
        $("#search_form").submit(e => {
            e.preventDefault();
            var loc = $("#location").val();
            window.location = `http://localhost/tripnepal/packages.php?loc=${loc}`;
        })
    </script>
</body>

</html>