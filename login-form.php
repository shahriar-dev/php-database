<?php
require "./Controllers/Validation/login-form-validation.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="login-form">
    <title>Login Form</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <fieldset>
            <legend style="text-align: center; font-size:50px;">Login</legend>

            <p>
                <span>
                    <label for="input_username">Username:</label>
                    <input type="text" id="input_username" placeholder="Username" name="username">
                    <label for="input_username_error" style="color: red;"><?php echo $UsernameError; ?></label>
                </span>
            </p>

            <p>
                <span>
                    <label for="input_password">Password:</label>
                    <input type="password" id="input_password" placeholder="Password" name="password">
                    <label for="input_password_error" style="color: red;"><?php echo $PasswordError; ?></label>
                </span>
            </p>

            <span>
                <input type="submit" id="input_submit" name="submit">
                <input type="reset" value="Clear Form">
                <label for="error_message" style="color:red;"><?php echo $Message ?></label>
            </span>
        </fieldset>
    </form>

    <div style="width:300px; height: 100px; clear:both;">
        <button style="width:100%; height:100%; background:blue; border-radius:2px; margin:0px; float:right;">
            <a style="color: white; font-family:Cambria; font-size:50px;" href="./registration-form.php">Register</a>
        </button>
    </div>

</body>

</html>