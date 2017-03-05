<?php
include('myClasses.php');

session_start();
?>

<?php
$sess ='FALSE';
$errMsg ='';
if($_POST) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
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
      <title>Lab 6 - Login</title>
   </head>
   <body>
      <h3>Login:</h3>
      <table>
         <form method="post">
            <tr>
                <td><label for="username">Username:</label>
				  <input type="text" name="username"></td>
                <td><label for="password">Password:</label>
				  <input type="password" name="password"></td>
                <td><label for="passwordHint">Password Hint:</label>
				  <input type="text" name="passwordHint"></td>
            </tr>
            <td><input type="submit" value="Submit"></td>
			<tr>
			<td><p><a href="forgotpassword.php">Forgot your password?</a></p></td>
			<td><p><a href="protectedstuff.php">Protected Stuff</a></p></td>
			<td><p><a href="page2.php">Page 2</a></p></td>
			</tr>
			<?php echo($errMsg); ?>
         </form>
      </table>
   </body>
</html>


