<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<table style="padding:50px" align="center" width="550px">
    <form action="" method="post">
        <td align="center" colspan="1"><a href="signup.php"><button type="button">SignUP</button></a></td></tr>
        <tr>
            <td align="left" colspan="2"> <h1>Login</h1> </td>
        </tr>
        <tr>
            <td> Login : </td><td><input type="text" name="login"></td>
        </tr>
        <tr>
            <td> Password : </td><td><input type="password" name="password"></td>
        </tr>

        <tr>
            <td align="center" colspan="2"><input type="submit" name="submit" value="Apply"></td></tr>

    </form>
</table>

<?php
if(isset($_POST["submit"]))
{

    if(count($_POST)>0)
    {
        //Including dbconfig file.
        include 'configDB.php';

        $login = $_POST["login"];

        $password = $_POST["password"];

        $EncryptPassword = md5($password);

        $finalResult = mysql_query("SELECT * FROM users_login WHERE login='$login' and password = '$EncryptPassword'");

        $confirm = mysql_fetch_array($finalResult);
        if(is_array($confirm)) {

            session_start();
            $_SESSION['user_name'] = $login;
            $_SESSION['sid']=session_id();

            header("location:dashboard.php");

        } else {


            echo '<center>' . "Wrong UserName or Password..." . '</center>';

        }

    }
}
?>

</body>
</html>