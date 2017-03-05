<?php
if ($_POST){
$fnameerr ="";
$lnameerr ="";
$orgerr ="";
$emailerr ="";
$phoneerr ="";
$datavalid = true;
$titleerr ="";
$titletype ="";
$dayserr ="";
$valid =true;

$monday = isset($_POST["monday"]) ? $_POST["monday"]: "";
$title = isset($_POST["title"]) ? $_POST["title"]: "";
$first = isset($_POST["firstName"]) ? $_POST["firstName"]: "";
$last = isset($_POST["lastName"]) ? $_POST["lastName"]: "";
$org = isset($_POST["organization"]) ? $_POST["organization"]: "";
$email = isset($_POST["organization"]) ? $_POST["organization"]: "";
$phone = isset($_POST["organization"]) ? $_POST["organization"]: "";
}
if($_GET["firstName"] == "") {
	$fnameerr = "First Name is required";
	$valid = false;
}
if($_POST["lastName"] == "") {
	$lnameerr = "Last Name is required";
	$valid = false;
}
if($_POST["organization"] == "") {
	$orgerr = "Organization is required";
		$valid = false;

}
if($_POST["email"] == "") {
	$emailerr ="Email is required";
		$valid = false;

}
if($_POST["phone"] == "") {
	$phoneerr ="phone number required";
		$valid = false;

}
	if(!empty($_POST['title'])) {
	$title=$_POST['title'];
	echo $title;
}
if($_POST['monday'] == null) {
	$dayerr = "Please select a day.";
		$valid = false;

}
$lines = file("./connect");
$j=0;
$host = trim($lines[$j++]);
$user = trim($lines[$j++]);
$pass = trim($lines[$j++]);
$dbnm = trim($lines[$j++]);
$con = mysqli_connect($host,$user,$pass,$dbnm) or die('Error connecting 
to SQL:'.mysqli_error($con));

$valid = true;
$day1 = "FALSE";
$day2 = "FALSE";

if(isset($_POST['title']) || !empty($_POST['title'])){
        $title = $_POST['title'];
}

$sqlCmd = 'INSERT INTO lab3 SET title="' . $title .
			'", firstName="' . $firstName .
			'", lastName="' . $lastName .
			'", organization="' . $organization .
			'", email="' . $email .
			'", phone="' . $phone .
			'", tshirt="' . $tshirt .
			'", dayAttending1="' . $day1 .
			'", dayAttending2="' . $day2 . '"';
			echo('Sent: ' . $sqlCmd);
			//Check for error
			$result = mysqli_query($con, $sqlCmd) or die('Query failed: '. mysqli_error($con));
			//Get data
			$sqlCmd = "SELECT * FROM lab3";
			$query = mysqli_query($con, $sqlCmd);
			//Table header
			?>
			<table border="1">
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Organization</th>
					<th>Email</th>
					<th>Phone</th>
					<th>T-Shirt</th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Action</th>
				</tr>
			<?php
					//Table continues
			while($result = mysqli_fetch_assoc($query))
			{
				//Table contents
				?>
					<tr>
						<td><?php echo($result["title"]); ?></td>
						<td><?php echo($result["firstName"]); ?></td>
						<td><?php echo($result["lastName"]); ?></td>
						<td><?php echo($result["organization"]); ?></td>
						<td><?php echo($result["email"]); ?></td>
						<td><?php echo($result["phone"]); ?></td>
						<td><?php echo($result["tshirt"]); ?></td>
						<td><?php echo($result["dayAttending1"]); ?></td>
						<td><?php echo($result["dayAttending2"]); ?></td>
						<td><a href = "file.php?var=<?php echo $result['phone']; ?>"></td>
					</tr>
				//Table row
				<?php
			}
			echo('</table>');
		}
	if(!$_POST || $valid == false)
	{
	?>
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
		<td><input type="radio" name="title" value="Mr" <?php 
if(isset($_POST['title'])){ $title = $_POST['title'];}?>>Mr</td>
		</tr>
		<tr>
		<td><input type="radio" name="title" value="Mrs" <?php 
if(isset($_POST['title'])){ $title = $_POST['title'];}?>>Mrs</td>
		</tr>
		<tr>
		<td><input type="radio" name="title" value="Ms" 
<?php
if(isset($_POST['title'])){ $title = $_POST['title'];}?>>Ms</td>
<?php if(!isset($_POST['title'])){ echo $titleerr;}?>
		</tr>
		</table>
	</td>
	</tr>
	<tr>
    	<td>First name:</td>
	<td><input name="firstName" type="text" value="<?php echo
isset($_POST['firstName']) ? $_POST['firstName'] : ''  ?>"> 
<?php 
echo 
$fnameerr;?> </td>
	</tr>
	<tr>
    	<td>Last name:</td>
	<td><input name="lastName" type="text" value="<?php echo
isset($_POST['lastName']) ? $_POST['lastName'] : ''
?>"> <?php echo $lnameerr;?></td>
	</tr>
	<tr>
    	<td>Organization:</td>
	<td><input name="organization" type="text" value="<?php echo
isset($_POST['organization']) ? $_POST['organization'] : ''
?>"> <?php echo $orgerr;?></td>
	</tr>
	<tr>
    	<td>Email address:</td>
	<td><input name="email" type="text" value="<?php echo
isset($_POST['email']) ? $_POST['email'] : ''
?>"><?php echo $emailerr;?></td>
	</tr>
	<tr>
    	<td>Phone number:</td>
	<td><input name="phone" type="text" value="<?php echo
isset($_POST['phone']) ? $_POST['phone'] : ''
?>"><?php echo $phoneerr;?></td>
	</tr>
	<tr>
    	<td>Days attending:</td>
	<td>
		<input name="monday" type="checkbox" 
value="monday">Monday 
		<input name="tuesday" type="checkbox" 
value="tuesday">Tuesday<td/> <?php echo $dayerr;?>
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
	<td><input name="reset" type="reset"></td>
	</tr>
  </form>
  </body>
</html>
<?php
	}
?>
