<?php
include('myClasses.php');
session_start();

if ($_POST) {
    $error        = false;
    $errMsg       = '';
    $username     = removeSpecialChars(strtolower($_POST['username']));
    $password     = removeSpecialChars($_POST['password']);
    $rePassword   = removeSpecialChars($_POST['rePassword']);
    $passwordHint = removeSpecialChars($_POST['passwordHint']);
    if (!empty($username)) {
        if (!empty($password)) {
            if (!empty($rePassword)) {
                if ($password == $rePassword)
                //open db
                    $db = new DBLink('int322_162a28');
                $result = $db->sqlQuery("SELECT username FROM users2 WHERE username='" . $username . "'");
                
                if (mysqli_num_rows($result) > 0) {
                    //user exists in db
                    $error  = true;
                    $errMsg = 'Error : Username already exists in db';
                } else {
                    $salt      = uniqid();
                    $cryptPass = crypt($password, $salt);
                    $result2   = $db->sqlQuery("INSERT INTO users2 (username,password,salt,role,passwordHint) VALUES ('" . $username . "','" . $cryptPass . "','" . $salt . "','user','" . $passwordHint . "')");
                }
            } else {
                //Password and re-password do not match
                $error  = true;
                $errMsg = 'Error : Passwords no not match';
            }
        } else {
            //re password was left empty
            $error  = true;
            $errMsg = 'Error : Please retype your password';
        }
    } else {
        //password left empty
        $error  = true;
        $errMsg = 'Error : Please enter a password';
    }
} else {
    $error  = true;
    $errMsg = 'Error : Please enter your username';
}
?>

<html>
   <head>
      <title>Lab 6</title>
      <link rel="stylesheet" type="text/css" href="includes/mystyle.css">
   </head>
   <body>
      <h3>Sign up:</h3>
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
               <td><label for="rePassword">Re-enter Password:</label></td>
               <td><input type="password" name="rePassword"></td>
               <tr></tr>
               <td><label for="passwordHint">Password Hint:</label></td>
               <td><input type="text" name="passwordHint"></td>
               <tr></tr>
               <td><input type="submit" value="Submit"></td
      </div>
      <tr>
      </table><table>
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