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

function redirect($url)
    {
        header("Location: ".$url);
        die();
        exit;
    }

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
                echo('Email was sent to ' . $row['username'] . '');
                
                $to = $emailAdd;
                $subject = 'Lab5: Password Recovery - ';
                $msg = 'Password hint for: ' . $row['username'] . ' is: ' . $row['passwordHint'];
                $msg = wordwrap($msg,70,"\r\n");
                mail($to,$subject,$msg);
            }
            else
            {
                $error = true;
                $errMsg = 'Error: Username not found in Database';
				                redirect("login2.php");

            }
            }
            else
            {
                redirect("login2.php");
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
        <table>
			<tr>
				<td><a href="login2.php">Login</a></td>
				<td><a href="forgotpassword.php">Reload Page</a></td>
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