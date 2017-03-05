<?php
session_start();
if(!isset($_SESSION['loggedIn']))
    {
        redirect("login2.php");
    }
$loggedIn = $_SESSION['loggedIn'];
function redirect($url)
    {
        header("Location: ".$url);
        die();
        exit;
    }
?>

<html>
   <head>
      <title>Lab 5</title>
   </head>
   <body>
    <h1>Lab 5 - Page 2</h1>
    <?php
    echo "<p>Display session variable: Logged in =" . $loggedIn . "";
    ?>
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