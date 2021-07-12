<?php
require "./Controllers/Validation/registration-form-validation.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="registration-form-with-validation">
    <title>Registration Form</title>
</head>

<body>

    <body>
        <h1>Registration form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <fieldset>
                <legend>Basic Information</legend>

                <p>
                    <label for="input_firstname">First Name:</label>
                    <input type="text" id="input_firstname" placeholder="First Name" name="firstName">
                    <span><label for="input_firstNameError" style="color: red;"><?php echo $FirstNameError ?></label></span>
                </p>

                <p>
                    <label for="input_lastname">Last Name:</label>
                    <input type="text" id="input_lastname" placeholder="Last Name" name="lastName">
                    <span><label for="input_lastNameError" style="color: red;"><?php echo $LastNameError ?></label></span>
                </p>

                <p>
                    <label for="gender_option">Gender</label>
                    <input type="radio" id="gender_option" name="gender" value="Male">Male</input>
                    <input type="radio" id="gender_option" name="gender" value="Female">Female</input>
                    <span><label for="input_genderError" style="color: red;"><?php echo $GenderError ?></label></span>
                </p>

                <p>
                    <label for="input_dob">Date of Birth:</label>
                    <input type="date" id="input_dob" name="dob">
                    <span><label for="input_dobError" style="color: red;"><?php echo $DoBError ?></label></span>
                </p>

                <p>
                    <label for="select_religion">Religion</label>
                    <select name="religion" id="select_religion" value="None">
                        <option>None</option>
                        <option>Muslim</option>
                        <option>Hindu</option>
                        <option>Christian</option>
                    </select>
                    <span><label for="select_religionError" style="color: red;"><?php echo $ReligionError ?></label></span>
                </p>
            </fieldset>

            <fieldset>
                <legend>Contact Information</legend>

                <p>
                    <span><label for="input_presentAddress">Present Address:</label></span>
                    <br>
                    <span>
                        <textarea name="presentAddress" id="input_presentAddress" cols="50" rows="5" placeholder="Enter Present Address Here"></textarea>
                    </span>
                </p>

                <p>
                    <span><label for="input_permanentAddress">Permanent Address</label></span>
                    <br>
                    <span><textarea name="permanentAddress" id="input_permanentAddress" cols="50" rows="5" placeholder="Enter Permanent Address Here"></textarea></span>
                </p>

                <p>
                    <label for="input_phonenumber">Phone:</label>
                    <input id="input_phonenumber" type="tel" placeholder="(+88) 0xxxxxxxxxx" name="phoneNumber">
                </p>

                <p>
                    <label for="input_email">Email:</label>
                    <input type="email" id="input_email" placeholder="something@domain.com" name="email">
                    <span><label for="input_emailerror" style="color: red"><?php echo $EmailError; ?></label></span>
                </p>

                <p>
                    <label for="input_personalWebsite">Personal Website Link:</label>
                    <input id="input_personalWebsite" type="url" placeholder="http://somesite.com" name="url">
                </p>
            </fieldset>

            <fieldset>
                <legend>Account Information</legend>

                <p>
                    <span><label for="input_username">Username:</label></span>
                    <span><input type="text" id="input_username" placeholder="Username" name="username"></span>
                    <span><label for="input_usernameerror" style="color: red"><?php echo $UsernameError; ?></label></span>
                </p>

                <p>
                    <span><label for="input_password">Password:</label></span>
                    <span><input type="password" id="input_password" placeholder="Password" name="password"></span>
                    <span><label for="input_passworderror" style="color: red"><?php echo $PasswordError; ?></label></span>
                </p>

            </fieldset>

            <p>
                <input type="submit" name="submit"> &nbsp;&nbsp;
                <input type="reset" value="Clear Form">
            </p>
        </form>
        <div>
            Already Have an Account? <a style="border: 0px; background:transparent; font-size: 50px; text-align:center; font-family:cambria" href="login-form.php">Click Here!</a>
        </div>

        <span><label for="successful_input" style="color: <?php echo $MessageColor; ?>"><b><?php echo $Message ?></b></label></span>
    </body>

</html>