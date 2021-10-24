<?php
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Account.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/config.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"]))
    {
        $firstName = FormSanitizer::sanitizeFromString ($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFromString ($_POST["lastName"]);
        $userName = FormSanitizer::sanitizeFormUsername ($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail ($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail ($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword ($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword ($_POST["password2"]);
        
        $success = $account->register($firstName, $lastName, $userName, $email, $email2, $password, $password2);
        if($success)
        {//store session
            $_SESSION["userLoggedIn"] = $userName;
            header("Location: index.php");
        }
    }

    function getInputValue($name)
{
    if(isset($_POST[$name]))
    {
        echo $_POST[$name];
    }
}
    
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome in CVmodo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/style.css">

</head>
<body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="asset/images/logo.png" title="logo" alt="site logo" />
                <h3>Sign Up</h3>
                <span>to continue to CVmodo</span>
            </div>
            <form method="POST">
                 <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$firstNameCharacters);  ?></div>
                <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName");?>" required>

                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$lastNameCharacters);  ?></div>
                <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName");?>" required>

                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$usernameCharacters);  ?></div>
                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$usernameTaken);  ?></div>
                <input type="text" name="username" placeholder="User name" value="<?php getInputValue("username");?>" required>

                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$emailsDontMatch);  ?></div>
                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$emailInvalid);  ?></div>
                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$emailTaken);  ?></div>
                <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email");?>" required>
                <input type="email" name="email2" placeholder="Confirm email" required>

                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$passwordsDontMatch);  ?></div>
                <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$passwordLength);  ?></div>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Condirm password" required>
               
                <input type="submit" nphpame="submitButton"  value="Submit">

            </form>
            <a href="login.php" class="signInMassege">Need an account ? Sign up here!</a>
        </div>
    </div>
</body>
</html>