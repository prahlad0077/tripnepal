<?php
include_once("../../app/_dbConnection.php");

if (isset($_POST['id'])) {

    $user_id = $_POST['id'];

    $userInstance = new Users();
    $res = $userInstance->getUser($user_id);
    $user = mysqli_fetch_assoc($res);
    if ($user['account_status'] == 1) {
        $userInstance->updateAccountStatus($user_id, 0);
        $mailHtml = "<div>
        <h3> <b>" . $user['full_name'] . "</b> we are sad to inform you that your account has been restricted. <br>
        If you think this is a mistake than contact with us as soon as possible.
        </div>";
    } else {
        $userInstance->updateAccountStatus($user_id, 1);
    }
    echo "<script> location.href = '../users.php' </script>";
}
