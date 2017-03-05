
<html>
   <head>
      <title>Lab 6 - Login</title>
   </head>
   <body>
      <h3>Login:</h3>
      <table>
         <form action="login.php" method="post">
            <tr>
                <td><label for="user">Username:</label>
				  <input type="text" name="user"></td>
                <td><label for="pass">Password:</label>
				  <input type="password" name="pass"></td>
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
<!--
Student Declaration
I/we declare that the attached assignment is my/our own work in accordance
with Seneca Academic Policy. No part of this assignment has been copied
manually or electronically from any other source (including web sites) or
distributed to other students.
Name ----Jonathan Seguin-------------------
Student ID ---035472158------------
-->