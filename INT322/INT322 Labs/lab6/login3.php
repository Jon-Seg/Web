<?php
include('myClasses.php');
session_start();
function redirect($url)
{
    header('Location:' . $url);
    die();
    exit;
}
?>
<?php
$sess   = false;
$errMsg = '';
$error  = true;
if ($_POST) {
    $user = removeSpecialChars($_POST['username']);
    $pass = removeSpecialChars($_POST['password']);
    
    $login           = new loginInfo;
    $login->username = strtolower($user);
    $login->password = $pass;
    if ($login->validate()) {
        if (!empty($user)) {
            if (!empty($pass)) {
                $db     = new DBLink('int322_162a28');
                $result = $db->sqlQuery("SELECT DISTINCT username, password, salt FROM users2 WHERE username='" . $login->username . "'");
                if (mysqli_num_rows($result) > 0) {
                    $row  = mysqli_fetch_assoc($result);
                    $salt = crypt($pass, $row["salt"]);
                    if ($row["username"] == $user) {
                        $sess = true;
                    }
                    if (crypt($row["password"], $salt) == $pass) {
                        $sess = true;
                    } else {
                        $error  = true;
                        $errMsg = 'Error: Bad login';
                    }
                    if ($sess == false) {
                        $_SESSION['loggedIn'] = 'FALSE';
                        redirect("login3.php");
?>
                <?php
                    }
                    if ($sess == true) {
                        $_SESSION['loggedIn'] = true;
                        redirect("protectedstuff.php");
                    }
                } else {
                    echo "User not found";
                    $_SESSION['loggedIn'] = false;
                }
            } else {
                $error  = true;
                $errMsg = 'Error: Empty password';
            }
        }
    } else {
        $error  = true;
        $errMsg = 'Error: Empty Username';
    }
}
?>
<html>
   <head>
      <title>Lab 6</title>
      <link rel="stylesheet" type="text/css" href="includes/mystyle.css">
   </head>
   <body>
      <h3>Login:</h3>
      <hr>
      <div class="div1">
         <?php
            if($error)
            {
            	echo('<p class="e1">' . $errMsg . '</p>');
            }
            ?>
         <table>
            <form method="post">
               <tr>
                  <td><label for="username">Username:</label></td>
                  <td><input type="text" name="username"></td>
               <tr></tr>
               <td><label for="password">Password:</label></td>
               <td><input type="password" name="password"></td>
               <tr></tr>
               <td><input type="submit" value="Submit"></td>
         </table>
      </div>
      <br><br><br><br><br>
      <table>
      <hr>
      <?php echo CNavigation::GenerateMenu($menu);?>
      </table>
      </form>
   </body>
</html>
<!--
Student Declaration
I/we declare that the attached assignment is my/our own work in accordance
with Seneca Academic Policy. No part of this assignment has been copied
manually or electronically from any other source (including web sites) or
distributed to other students.
Name ----Jonathan Seguin-------------------
Student ID ---035472158------------
-->