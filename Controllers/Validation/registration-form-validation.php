<?php
// require "./Controllers/Database/dbConnect.php";
require "./Controllers/Database/dbAdd.php";

$FirstNameError = "";
$LastNameError = "";
$GenderError = "";
$DoBError = "";
$ReligionError = "";
$EmailError = "";
$UsernameError = "";
$PasswordError = "";
$WebsiteError = "";

$FirstName = "";
$LastName = "";
$Gender = "";
$Religion = "";
$Email = "";
$Username = "";
$Password = "";
$DoB = "";
$PresentAddress = "";
$PermanentAddress = "";
$PhoneNumber = "";
$PersonalWebsite = "";
$flag = 0;


$emptyField = false;
$Message = "";
$MessageColor = 'green';


define("filepath", "data.txt");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST['firstName'])) {
            $FirstNameError = "First Name is Required!";
            $emptyField = true;
            $flag = 1;
        }
        if (empty($_POST['lastName'])) {
            $LastNameError = "Last Name is Required!";
            $emptyField = true;
            $flag = 1;
        }
        if ($flag == 0) {
            $FirstName = Test_User_Input($_POST['firstName']);
            $LastName = Test_User_Input($_POST['lastName']);
            if (!preg_match("/^[A-Za-z. ]*$/", $FirstName)) {
                $FirstNameError = "Only Letters and White Spaces are Allowed!";
                $emptyField = true;
            }
            if (!preg_match("/^[A-Za-z. ]*$/", $LastName)) {
                $LastNameError = "Only Letters and White Spaces are Allowed!";
                $emptyField = true;
            }
        }

        if (empty($_POST['gender'])) {
            $GenderError = "Gender is Required!";
            $emptyField = true;
        } else {
            $Gender = Test_User_Input($_POST['gender']);
        }

        if (empty($_POST['dob'])) {
            $DoBError = "Date of Birth Required!";
            $emptyField = true;
        } else {
            $DoB = Test_User_Input($_POST['dob']);
        }

        if (empty($_POST['religion']) || Test_User_Input($_POST['religion']) == "None") {
            $ReligionError = "Religion Required!";
            $emptyField = true;
        } else {
            $Religion = Test_User_Input($_POST['religion']);
        }

        if (empty($_POST['email'])) {
            $EmailError = "Email is Required!";
            $emptyField = true;
        } else {
            $Email = Test_User_Input($_POST['email']);
            if (!preg_match("/[a-zA-Z0-9._]{3,}@[a-zA-Z0-9._]{3,}[.]{1}[a-zA-Z0-9._]{2,}/", $Email)) {
                $EmailError = "Invalid Format";
                $emptyField = true;
            }
        }

        if (empty($_POST['username'])) {
            $UsernameError = "Username REQUIRED!";
            $emptyField = true;
        } else {
            $Username = Test_User_Input($_POST['username']);

            if (!preg_match("/^[A-Za-z0-9. ]*$/", $Username)) {
                $UsernameError = "Only Number and lowercase, Uppercase Letter are Allowed!";
                $emptyField = true;
            }

            if (strlen($Username) < 6) {
                $UsernameError = "Username length must be > 5";
                $emptyField = true;
            }
        }

        if (empty($_POST['password'])) {
            $PasswordError = "You must Enter a Password!";
            $emptyField = true;
        } else {
            $Password = Test_User_Input($_POST['password']);

            $UpperCase = preg_match("@[A-Z]@", $Password);
            $LowerCase = preg_match("@[a-z]@", $Password);
            $Number = preg_match("@[0-9]@", $Password);

            if (!$UpperCase || !$LowerCase || !$Number) {
                $PasswordError = "Password must contain 1 UPPERCASE, 1 LOWERCASE and 1 NUMBER";
                $emptyField = true;
            }

            if (strlen($Password) < 6) {
                $PasswordError = "Password length must be > 5";
                $emptyField = true;
            }
        }

        if (!empty($_POST['presentAddress'])) {
            $PresentAddress = Test_User_Input($_POST['presentAddress']);
        }
        if (!empty($_POST['permanentAddress'])) {
            $PermanentAddress = Test_User_Input($_POST['permanentAddress']);
        }

        if (!empty($_POST['phoneNumber'])) {
            $PhoneNumber = Test_User_Input($_POST['phoneNumber']);
        }

        if (!empty($_POST['personalWebsite'])) {
            $PersonalWebsite = Test_User_Input($_POST['personalWebsite']);
            if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $PersonalWebsite)) {
                $WebsiteError = "Invalid Website Address Format!";
            }
        }

        if (!$emptyField) {
            $response = insertUser($FirstName, $LastName, $Gender, $DoB, $Religion, $PresentAddress, $PermanentAddress, $PhoneNumber, $Email, $PersonalWebsite, $Username, $Password);
            if ($response) {
                $Message = "Registration SUCCESSFUL";
            } else {
                $Message = "Unable to complete REGISTRATION! Try again ....";
                $MessageColor = 'red';
            }
        }
    }
}


function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
