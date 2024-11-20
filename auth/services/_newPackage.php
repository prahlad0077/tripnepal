<?php

include_once("../../app/_dbConnection.php");

if (isset($_POST['package_name']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['price']) && isset($_POST['capacity']) && isset($_POST['master-img'])) {

    $package_name = $_POST['package_name'];
    $package_desc = $_POST['package_desc'];
    $package_start = $_POST['start'];
    $package_end = $_POST['end'];
    $package_price = $_POST['price'];
    $package_capacity = $_POST['capacity'];
    $no_of_people = $_POST['no_of_people'];
    $package_location = $_POST['loc'];
    $keywords = $_POST['keywords'];
    $map_loc = $_POST['map'];
    $is_exclusive = 0;
    if (isset($_POST['is_exclusive'])) {
        $is_exclusive = 1;
    }

    $is_hotel = 0;
    $is_transport = 0;
    $is_food = 0;
    $is_guide = 0;
    $features = array();

    if ((isset($_POST['features']))) {
        $features = $_POST['features'];
    }
    foreach ($features as $feature) {
        if ($feature == 'hotel') $is_hotel = 1;
        else if ($feature == 'transport') $is_transport = 1;
        else if ($feature == 'food') $is_food = 1;
        else if ($feature == 'guide') $is_guide = 1;
    }

    $master_image = $_POST['master-img'];
    $extra_image_1 = $_POST['ex1'];
    $extra_image_2 = $_POST['ex2'];

    $packagesInstance = new Packages();

    $packagesInstance->createPackage($package_name, $package_desc, $package_start, $package_end, $package_price, $package_location, $is_hotel, $is_transport, $is_food, $is_guide, $package_capacity, $map_loc, $master_image, $extra_image_1, $extra_image_2, $is_exclusive, $keywords, $no_of_people);

    echo "<script> location.href = '../packages.php' </script>";
}
