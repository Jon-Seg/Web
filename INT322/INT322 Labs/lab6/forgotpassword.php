<?php
include('myClasses.php');
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
        $sql = "SELECT DISTINCT username, passwordHint FROM users2 WHERE username='" . $emailAdd . "'";
        $result = mysqli_query($con,$sql) or die('Query failed: '. mysqli_error($con));
        mysqli_close($con);
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            if($row["username"] == $emailAdd)
            {
                echo('Email was sent to ' . $row['username'] . '');
                
                $to = $emailAdd;
                $subject = 'Lab6: Password Recovery - ';
                $msg = 'Password hint for: ' . $row['username'] . ' is: ' . $row['passwordHint'];
                $msg = wordwrap($msg,70,"\r\n");
                mail($to,$subject,$msg);
            }
            else
            {
                $error = true;
                $errMsg = 'Error: Username not found in Database';
				                redirect("login3.php");

            }
            }
            else
            {
                redirect("login3.php");
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
    <title>Lab 6 - Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="includes/mystyle.css">
  </head>
  <body>
	<h3>Forgot Password:</h3>
		  <hr>
		  <div class="div1">
	<?php
		if($error){
			echo('<p class="e1">' . $errMsg . '</p>');
		}
		?>
	<form method="post">
		<table>
			<tr>
				<td>Email Address:</td>
				<td><input type="email" name="email"></td>
			</tr>
		</table>
		
		<input type="submit">
		  </div>
	</form>
        <table>
			<br><br><br><br><br><br><hr>
						        <?php echo CNavigation::GenerateMenu($menu);?>
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