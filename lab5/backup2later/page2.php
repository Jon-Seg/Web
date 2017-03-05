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