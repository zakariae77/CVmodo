<?php
 require_once("includes/classes/FormSanitizer.php");
 require_once("includes/classes/Account.php");
 require_once("includes/classes/Constants.php");
 require_once("includes/config.php");

 $account = new Account($con);

if(isset($_POST["submitButton"]))
{
    $userName = FormSanitizer::sanitizeFormUsername ($_POST["username"]);
    $password = FormSanitizer::sanitizeFormPassword ($_POST["password"]);
    
    $success = $account->login($userName, $password);
    if($success)
    {//store session
        $_SESSION["userLoggedIn"] = $userName;
        header("Location: indix.php");
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
    <title>Welcome in reeceflix</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/style.css">

</head>
<body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="asset/images/logo.png" title="logo" alt="site logo" />
                <h3>Sign In</h3>
                <span>to continue to CVmodo</span>
            </div>
            <form method="POST">
            <div style="color:red;font-size:12px;"><?php  echo $account->getError(Constants::$loginFailed);  ?></div>
                <input type="text" name="username" placeholder="User name" value="<?php getInputValue("username")?>" required>
   
                <input type="password" name="password" placeholder="Password" required>
               
                <input type="submit" name="submitButton"  value="submit">

            </form>
            <a href="register.php" class="signInMassege">Already have an account ? Sign in here!</a>
        </div>
    </div>
</body>
</html>