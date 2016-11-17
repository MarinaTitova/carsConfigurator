<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<table bgcolor="#f2f2f2" style="padding:50px" align="center" width="550px">
    <form action="" method="post">
        <tr><td align="center" colspan="2"> <h1>Login Page</h1> </td></tr>
        <tr>
            <td> Email : </td><td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td> Password : </td><td><input type="password" name="password"></td>
        </tr>

        <tr>
            <td align="center" colspan="2"><input type="submit" name="submit"></td></tr>
        <td align="center" colspan="2"><a href="sign-up.php"><button type="button">SignUP</button></a></td></tr>

    </form>
</table>

<?php
if(isset($_POST["submit"]))
{

    if(count($_POST)>0)
    {
        //Including dbconfig file.
        include 'configDB.php';

        $email = $_POST["email"];

        $password = $_POST["password"];

        $EncryptPassword = md5($password);

        $finalResult = mysql_query("SELECT * FROM signup WHERE email='$email' and Password = '$EncryptPassword'");

        $confirm = mysql_fetch_array($finalResult);

        if(is_array($confirm)) {

            session_start();
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