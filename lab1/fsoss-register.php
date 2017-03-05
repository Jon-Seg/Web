<!DOCTYPE html>
<html>
  <head>
    <title>FSOSS Registration</title>
  </head>
  <body>
  <h1>FSOS Registration</h1>
  <form method="post" name="fsoss">
	<table>
	<tr>
    	<td valign="top">Title:</td>
	<td>
		<table>
		<tr>
		<td><input type="radio" name="title" value="mr">Mr</td>
		</tr>
		<tr>
		<td><input type="radio" name="title" value="mrs">Mrs</td>
		</tr>
		<tr>
		<td><input type="radio" name="title" value="ms">Ms</td>
		</tr>
		</table>
	</td>
	</tr>
	<tr>
    	<td>First name:</td>
	<td><input name="firstName" type="text" value="<?php 
echo 
isset($_POST['firstName']) ? $_POST['firstName'] : ''
?>">
 </td>
	</tr>
	<tr>
    	<td>Last name:</td>
	<td><input name="lastName" type="text" value="<?php echo
isset($_POST['lastName']) ? $_POST['lastName'] : ''
?>"></td>
	</tr>
	<tr>
    	<td>Organization:</td>
	<td><input name="organization" type="text" value="<?php echo
isset($_POST['organization']) ? $_POST['organization'] : ''
?>"></td>
	</tr>
	<tr>
    	<td>Email address:</td>
	<td><input name="email" type="text" value="<?php echo
isset($_POST['email']) ? $_POST['email'] : ''
?>"></td>
	</tr>
	<tr>
    	<td>Phone number:</td>
	<td><input name="phone" type="text" value="<?php echo
isset($_POST['phone']) ? $_POST['phone'] : ''
?>"></td>
	</tr>
	<tr>
    	<td>Days attending:</td>
	<td>
		<input name="monday" type="checkbox" 
value="monday">Monday
		<input name="tuesday" type="checkbox" 
value="tuesday">Tuesday<td/>
	</tr>
	<tr>
	<td>T-shirt size:</td>
	<td>
	<select name="t-shirt">
	<option>--Please choose--</option>
	<option name="small" value="s">Small</option>
	<option value="m">Medium</option>
	<option value="l">Large</option>
	<option value="xl">X-Large</option>
	</select>
	</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
	<td></td>
	<td><input name="submit" type="submit"></td>
	</tr>
  </form>
  </body>
</html>

<?php

if(isset($_POST["submit"]))
{
$first = isset($_POST["firstName"]) ? $_POST["firstName"]: "";
$last = isset($_POST["lastName"]) ? $_POST["lastName"]: "";
$org = isset($_POST["organization"]) ? $_POST["organization"]: "";
$email = isset($_POST["organization"]) ? $_POST["organization"]: "";
$phone = isset($_POST["organization"]) ? $_POST["organization"]: "";
if($_POST["firstName"] == "") {
    echo  "Error: First Name is required";
}
if($_POST["lastName"] == "") {
    echo  "<br>Error: Last Name is required";
}
if($_POST["organization"] == "") {
    echo  "<br>Error: Organization Name is required";
}
if($_POST["email"] == "") {
    echo  "<br>Error: Email is required";
}
if($_POST["phone"] == "") {
    echo  "<br>Error: Phone Number is required";
}

}


?> <br>
