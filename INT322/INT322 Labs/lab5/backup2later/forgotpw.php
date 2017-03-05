<?php
    $j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$host = trim($lines[$j++]);
	$username = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbnm = trim($lines[$j++]);

    if($_POST)
    {
    $user = trim($_POST['user']);

if(!empty($user))
    {
        if(!empty($pass))
        {
            $con = mysqli_connect($host,$username,$pw,$dbnm) or die("Error connecting to SQL: " . mysqli_error($con));
            $sql = "SELECT DISTINCT username, passwordHint FROM users WHERE username='" . $user . "'";
            $result = mysqli_query($con,$sql) or die('Query failed: '. mysqli_error($con));
            mysqli_close($con);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                if($row['username'] == $user)
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
                redirect("login2.php");
                ?>
                
                <?php
                }
                if($sess == 'TRUE')
                {
                mail($row['username'],"Recover lab 5 password","Here are the steps to recover your password...","From: Jonathan <jon@domain.tld>\r\nReply-to: Bob <bob@domain.tld>");
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
    <h3>Recover Password</h3>
     <table>
         <form action="forgotpw.php" method="post">
            <tr>
                <td><label for="user">Username:</label>
				  <input type="text" name="user"></td>
                <td><label for="pass">Password:</label>
				  <input type="password" name="pass"></td>
            </tr>
            <td><input type="submit" value="Submit"></td>
			<tr>
			</tr>
         </form>
      </table>
</body>
</html>