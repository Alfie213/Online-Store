<?php
session_start();

if($_SESSION != null)
{
    header("Location: index.php");
}
?>

<?php
    if(isset($_REQUEST['sub']))
    {
        require('data.php');
        $con = mysqli_connect ($host, $user, $pas) or die('error_con');
        mysqli_select_db($con, $db) or die('error_db');
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $request = "SELECT * FROM `users` WHERE email='".$email."' AND password='".$password."'";
        $res = mysqli_query($con, $request);

        if(mysqli_num_rows($res)==1){
            // Начало сессии.
            //session_start();
            foreach($res as $result)
            {
                $_SESSION["idUser"] = $result["id_user"];
                $_SESSION["email"] = $result["email"];
                $_SESSION["admin"] = $result["admin"];
                $_SESSION["isStarted"] = true;
            }
            header('Location: index.php');
        }
        else{
            header('Location:registration.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/authreg.css">
</head>
<body>
    <div id="authreg">
        <form action="auth.php" name="form1" class="form1" method="get" onsubmit="return FormData();">
            <div class="form">
                <label for="">Email</label>
                <input type="email" name="email" class="email">
                <label for="">password</label>
                <input type="password" name="password" class="password">
                <input type="submit" value="sign in" name="sub" class="sub">
            </div>
        </form>
    </div>
</body>
</html>