<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Registration</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<table style="padding:50px" align="center" width="550px">
    <form action="" method="post">
        <td align="center" colspan="1"><a href="login.php"><button type="button">SignIN</button></a></td></tr>

        <tr>
            <td align="left" colspan="2"> <h1>Registration</h1> </td>
        </tr>
        <tr>
            <td> Login : </td><td><input type="text" name="login"></td>
        </tr>
        <tr>
            <td> Password : </td><td><input type="password" name="password"></td>
        </tr>
        <tr>
           <td align="center" colspan="2"><input type="submit" name="submit" value="Apply"></td>
        </tr>



    </form>
</table>

<?php
if(isset($_POST["submit"]))
{

    //Including dbconfig file.
    include 'configDB.php';

    $login = $_POST["login"];
    $password = $_POST["password"];

    $EncryptPassword = md5($password);

    mysql_query("INSERT INTO users_login (login,password) VALUES ('$login','$EncryptPassword')");

    echo '<center> Sign Up form successfully submitted. </center>';

}

?>

</body>
</html>