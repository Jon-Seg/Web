<?php
    $j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$db = trim($lines[$j++]);
	$user = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbname = trim($lines[$j++]);
    session_start();
    function redirect($url)
    {
        header('Location: ' . $url);
        die();
    }
?>

<?php
if($_POST)
{
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    if(!empty($user))
    {
        if(!empty($pass))
        {
            $con = mysqli_connect($host,$user,$pass,$dbnm) or die("Error connecting to SQL: " . mysqli_error($con));
            $sql = "SELECT DISTINCT username, password FROM users WHERE username='" . $user . "' AND password='" . $pass . "'";
            $result = mysqli_query($con,$sql) or die('Query failed: '. mysqli_error($con));
            mysqli_close($con);
            
            if (mysqli_num_rows($result) >0)
            {
                $row = mysqli_fetch_assoc($result);
                if($row["user"] == $user)
                {
                    $_SESSION['loggedIn'] = 'TRUE';
                    ?>
                    <?php
                    redirect("login.php");
                }
                else
                {
                    $error = true;
                    $errMsg = 'Error: Bad login';
                }
            }
            else
            {
                $error = true;
                $errMsg = 'Error: Empty password';
            }
        }
        else
        {
            $error = true;
            $errMsg = 'Error: Empty Username';
        }
    }
    ?>

<html>
   <head>
      <title>Lab 5</title>
   </head>
   <body>
    <h1>Lab 5</h1>
      <h3>Login:</h3>
      <table>
         <form action="login.php" method="post">
            <tr>
                <td><label for="user">Username:</label>
				  <input type="text" name="user"></td>
                <td><label for="pass">Password:</label>
				  <input type="password" name="pass"></td>
            </tr>
            <td><input type="submit"></td>
         </form>
      </table>
   </body>
</html>