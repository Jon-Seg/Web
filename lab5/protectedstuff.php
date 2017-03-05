<?php
session_start();
function redirect($url)
    {
        header("Location: ".$url);
        die();
        exit;
    }

if(isset($_SESSION['loggedIn']))
{
$loggedIn = $_SESSION['loggedIn'];    
}
else
{
    $loggedIn ='';
    redirect("login2.php");
    
}

?>
<html>
  <head>
    <title>Lab 5</title>
  </head>
  <body>
    <h1>Lab 5 - Protected Stuff</h1>
<?php
if($loggedIn == 'TRUE')
{?>
<h1>Welcome</h1>
<?php
}
else
{?>
<p>You are not logged in</p>
<?php }?>
<table>
  <tr>
    <td><a href="logout.php">Logout / Login session</a></td>
    <td><p><a href="page2.php">Page 2</a></p></td>
</tr>
</table>
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
