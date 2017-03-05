<?php
    $j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$host = trim($lines[$j++]);
	$username = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbnm = trim($lines[$j++]);
    
    session_start();
    function redirect($url)
    {
        header('Location:' . $url);
        die();
        exit;
    }
?>
<?php
$sess ='FALSE';
$errMsg ='';
if($_POST) {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    if(!empty($user))
    {
        if(!empty($pass))
        {
            $con = mysqli_connect($host,$username,$pw,$dbnm) or die("Error connecting to SQL: " . mysqli_error($con));
            $sql = "SELECT DISTINCT username, password FROM users WHERE username='" . $user . "' AND password='" . $pass . "'";
            $result = mysqli_query($con,$sql) or die('Query failed: '. mysqli_error($con));
            mysqli_close($con);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                if($row["username"] == $user)
                    {
                    $sess = 'TRUE';
                    }
                if($row["password"] == $pass)
                {
                    $sess = 'TRUE';  
                }
                else
                {
                    $error = true;
                    $errMsg = 'Error: Bad login';
                }
                if($sess == 'FALSE')
                {
                $_SESSION['loggedIn'] = 'FALSE';
                redirect("login2.php");
                ?>
                
                <?php
                }
                if($sess == 'TRUE')
                {
                $_SESSION['loggedIn'] = 'TRUE';
                redirect("protectedstuff.php");
                }
            }
                else
                {
                    echo"User not found";
                    $_SESSION['loggedIn'] = 'FALSE';
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
         <form action="login2.php" method="post">
            <tr>
                <td><label for="user">Username:</label>
				  <input type="text" name="user"></td>
                <td><label for="pass">Password:</label>
				  <input type="password" name="pass"></td>
            </tr>
            <td><input type="submit" value="Submit"></td>
         </form>
      </table>
      <?php echo($errMsg); ?>
   </body>
</html>