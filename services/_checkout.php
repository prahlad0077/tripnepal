<?php
include_once("../app/_dbConnection.php");

$userInstance = new Users();
$res = $userInstance->getUser($_GET['user']);
$user = mysqli_fetch_assoc($res);

$packageInstance = new Packages();
$res = $packageInstance->getPackage($_GET['package']);
$package = mysqli_fetch_assoc($res);

$total_amount = $package['package_price'];
$transaction_uuid = uniqid();
$product_code = "EPAYTEST";

$message = "total_amount=" . $total_amount . ",transaction_uuid=" . $transaction_uuid . ",product_code=" . $product_code;
$secret = "8gBm/:&EnhH.1/q";

$tax_amount = 0;
$product_service_charge = 0;
$product_delivery_charge = 0;
$success_url = "http://localhost/tripnepal/success.php";
$failure_url = "http://localhost/tripnepal/fail.php";
$signed_field_names = "total_amount,transaction_uuid,product_code";
$signature = base64_encode(hash_hmac('sha256', $message, $secret, true));

if (!isset($_SESSION)) {
    session_start();
    $_SESSION["package_id"] = $_GET['package'];
}

?>

<body>
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" style="display: none;" id="esewa_form">
        <input type="text" id="amount" name="amount" value="<?php echo $total_amount; ?>" required>
        <input type="text" id="tax_amount" name="tax_amount" value ="<?php echo $tax_amount; ?>" required>
        <input type="text" id="total_amount" name="total_amount" value="<?php echo $total_amount; ?>" required>
        <input type="text" id="transaction_uuid" name="transaction_uuid" value="<?php echo $transaction_uuid; ?>" required>
        <input type="text" id="product_code" name="product_code" value ="<?php echo $product_code; ?>" required>
        <input type="text" id="product_service_charge" name="product_service_charge" value="<?php echo $product_service_charge; ?>" required>
        <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="<?php echo $product_delivery_charge; ?>" required>
        <input type="text" id="success_url" name="success_url" value="<?php echo $success_url; ?>" required>
        <input type="text" id="failure_url" name="failure_url" value="<?php echo $failure_url; ?>" required>
        <input type="text" id="signed_field_names" name="signed_field_names" value="<?php echo $signed_field_names; ?>" required>
        <input type="text" id="signature" name="signature" value="<?php echo $signature; ?>" required>
        <input value="Submit" type="submit">
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("esewa_form").submit();
        });
    </script>
</body>
