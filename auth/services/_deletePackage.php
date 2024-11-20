<?php
include_once("../../app/_dbConnection.php");

if (isset($_GET['id'])) {
    $package_id = ($_GET['id']);
    $blogsInstance = new Packages();
    $blogsInstance->deletePackage($package_id);
    echo "<script> location.href = '../packages.php' </script>";
}