<?php
require './Controllers/Database/dbGetUsers.php';
session_start();
$UsernameError = "";
$PasswordError = "";

$Username = "";
$Password = "";

$LoginErrorMessage = "";
$emptyField = false;
$Message = "";
$user;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST['username'])) {
            $UsernameError = "Username Required!";
            $emptyField = true;
        } else {
            $Username = Test_User_Input($_POST['username']);

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $Username)) {
                $UsernameError = "Only Number and lowercase, Uppercase Letter are Allowed!";
                $emptyField = true;
            }
        }

        if (empty($_POST['password'])) {
            $PasswordError = "Password REQUIRED!";
            $emptyField = true;
        } else {
            $Password = Test_User_Input($_POST['password']);
        }

        if (!$emptyField) {
            $response = getUser($Username, $Password);
            if ($response) {
                $_SESSION['id'] = $Username;
                header("Location: welcome-page.php");
            } else {
                $Message = "Login Failed! Try again ....";
            }
        }
    }
}

function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
