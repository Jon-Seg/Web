<?php
session_start();
function redirect($url)
    {
        header("Location: ".$url);
        die();
        exit;
    }
$_SESSION['loggedIn'] = 'FALSE';
session_destroy();
setcookie("PHPSESSID","",time()-61200,"/");
redirect("login2.php"); ?>
<html>
  <head>
    <title>Lab 5</title>
  </head>
  <body>
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