<?php
session_start();
function redirect($url)
    {
        header("Location: ".$url);
        die();
        exit;
    }
$_SESSION['loggedIn'] = 'FALSE';
setcookie("PHPSESSID","",time()-61200,"/");
redirect("login2.php"); ?>
<html>
  <head>
    <title>Lab 5</title>
  </head>
  <body>
    
  </body>
</html>