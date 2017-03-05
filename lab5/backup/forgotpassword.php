<?php
    $j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$host = trim($lines[$j++]);
	$username = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbnm = trim($lines[$j++]);
session_start();
$msg="";
$error="false";
$errMsg="";
?>

<?php
if($_POST)
{
    $emailAdd = trim($_POST['email']);
    if(!empty($emailAdd))
    {
        $con = mysqli_connect($host,$username,$pw,$dbnm) or die("Error connecting to SQL: " . mysqli_error($con));
        $sql = "SELECT DISTINCT username, passwordHint FROM users WHERE username='" . $emailAdd . "'";
        $result = mysqli_query($con,$sql) or die('Query failed: '. mysqli_error($con));
        mysqli_close($con);
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if($row["username"] == $emailAdd)
            {
                echo("Email was sent");
                
                $to = $emailAdd;
                $subject = 'Lab5: Password Recovery - ' . rand(0,10000);
                $msg = 'Your password hint is: ' . $row['passwordHint'];
                $msg = wordwrap($msg,70,"\r\n");
                mail($to,$subject,$msg);
            }
            else
            {
                $error = true;
                $errMsg = 'Error: Username not found in Database';
            }
            }
            else
            {
                echo"0 results in Database for . $emailAdd . ";
            }
        }
        else
        {
            $error = true;
            $errMsg = 'Error: Empty email field';
        }
    }
?>
<html>
  <head>
    <title>Lab 5 - Forgot Password</title>
  </head>
  <body>
	<h1>Lab 5 - Forgot Password</h1>
	<form method="post">
		<table>
			<tr>
				<td>Email Address:</td>
				<td><input type="email" name="email"></td>
			</tr>
		</table>
		<?php
		if($error){
			echo('<p>' . $errMsg . '</p>');
		}
		?>
		<input type="submit">
	</form>
        <p><a href="login2.php">Login</a></p>
        <p><a href="forgotpassword.php">Reload Page</a></p>
  </body>
</html>