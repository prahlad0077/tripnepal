<?php
include_once("./app/_dbConnection.php");

if (!isset($_SESSION)) {
    session_start();
}

$data = $_GET['data'];

$decode = base64_decode($data);

$decode = json_decode($decode, true);

$tran_id = $decode['transaction_uuid'];
$user_id = $_SESSION['user_id'];
$package_id = $_SESSION['package_id'];
$amount = (int)str_replace(',', '', $decode['total_amount']);
$tran_date = date("Y-m-d H:i:s");
$card_type = "Esewa";

$transactionInstance = new Transactions();
$transactionInstance->createNewTransaction($tran_id, $user_id, $package_id, $amount, $tran_date, $card_type);
$packagesInstance = new Packages();
$res = $packagesInstance->getPackage($package_id);
$package = mysqli_fetch_assoc($res);
$count = $package['package_booked'];
$count = $count + 1;
$packagesInstance->updatePackagePurchase($package_id, $count);

header("Location: ./auth/user_dashboard.php");
$_SESSION['package_id'] = null;
?>