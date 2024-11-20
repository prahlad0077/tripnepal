<?php
include_once "../app/_dbConnection.php";

function checkPass($pass)
{
    $invalid = array("=", "*", "-", "#", "$", "'");
    $flag = true;
    for ($x = 0; $x < strlen($pass); $x++) {
        for ($i = 0; $i < sizeof($invalid); $i++) {
            if ($pass[$x] == $invalid[$i]) {
                $flag = false;
                break;
            }
        }
    }
    return $flag;
}

if (isset($_POST['newUser']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $auth = new Auth();

    // Check if username exists
    if (!$auth->checkUserName($username)) {
        die(header("HTTP/1.0 406 Username Exists"));
    }

    // Check if Email exists
    if (!$auth->checkEmail($email)) {
        die(header("HTTP/1.0 406 Email Exists"));
    }

    // Check for invalid characters in password
    if (!checkPass($pass)) {
        die(header("HTTP/1.0 406 Not Acceptable Password."));
    }

    // Password Encryption
    $pass = sha1($pass);

    if ($auth->createUser($username, $email, $pass) == '200') {
        $mailHtml = "<div>
        <h3>Welcome $username to tripnepal. Travel Nepal like never before. <br>
        <a href='http://localhost/tripnepal/packages.php'>Check our recommended packages</a> and start planning for your next trip!
        </div>";
        echo '200';
    }
}
