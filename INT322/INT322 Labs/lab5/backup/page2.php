<?php
session_start();
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
    <h1>Lab 5</h1>
    <?php
    echo "<p>Display session variable: Logged in =" . $loggedIn . "";
    ?>
   </body>
</html>