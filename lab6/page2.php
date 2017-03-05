<?php
include('myClasses.php');
session_start();

if (!isset($_SESSION['loggedIn'])) {
    redirect("login3.php");
}
$loggedIn = $_SESSION['loggedIn'];
function redirect($url)
{
    header("Location: " . $url);
    die();
    exit;
}
?>

<html>
   <head>
      <title>Lab 6</title>
      <link rel="stylesheet" type="text/css" href="includes/mystyle.css">
   </head>
   <body>
      <h3>Page 2:</h3>
      <hr>
      <div class="d1">
         <?php
            echo "<p>Display session variable: Logged in =" . $loggedIn . "</p>";
            ?>
         <br>
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