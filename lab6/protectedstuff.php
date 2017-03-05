<?php
include('myClasses.php');
session_start();
function redirect($url)
{
    header("Location: " . $url);
    die();
    exit;
}

if (isset($_SESSION['loggedIn'])) {
    $loggedIn = $_SESSION['loggedIn'];
} else {
    $loggedIn = '';
    redirect("login3.php");
}
?>
<html>
   <head>
      <title>Lab 5</title>
      <link rel="stylesheet" type="text/css" href="includes/mystyle.css">
   </head>
   <body>
      <h3>Protected Stuff:</h3>
      <hr>
      <div class="d1">
         <?php
            if($loggedIn == 'TRUE')
            {?>
         <p>Welcome!
         <p>
         <p>You have successfully signed in!</p>
         <?php
            }
            else
            {?>
         <p>You are not logged in</p>
         <?php }?>
         <table>
            <br><br><br><br><br><br><br>
            <hr>
            <?php echo CNavigation::GenerateMenu($menu);?>
         </table>
      </div>
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
