<?php
include('myClasses.php');

session_start();
?>

<?php
if(isset($_POST['password'])){
	$password = $_POST['password'];
}
$cryptedPass = crypt($password);
var_dump($cryptedPass);
    if((crypt($password,$cryptedPass)) == $cryptedPass)
       {
        echo ("success");
       }
	   else{
		echo("fail");
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
                <td><label for="user">Username:</label>
				  <input type="text" name="username"></td>
                <td><label for="pass">Password:</label>
				  <input type="password" name="password"></td>
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