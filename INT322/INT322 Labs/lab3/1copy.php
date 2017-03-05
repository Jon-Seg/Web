
<?php

$fnameerr ="";
$lnameerr ="";
$orgerr ="";
$emailerr ="";
$phoneerr ="";
$datavalid = true;
$titleerr ="";
$titletype ="";
$dayserr ="";
if(isset($_POST["submit"]))
{
$monday = isset($_POST["monday"]) ? $_POST["monday"]: "";
$title = isset($_POST["title"]) ? $_POST["title"]: "";
$first = isset($_POST["firstName"]) ? $_POST["firstName"]: "";
$last = isset($_POST["lastName"]) ? $_POST["lastName"]: "";
$org = isset($_POST["organization"]) ? $_POST["organization"]: "";
$email = isset($_POST["organization"]) ? $_POST["organization"]: "";
$phone = isset($_POST["organization"]) ? $_POST["organization"]: "";
if($_POST["firstName"] == "") {
        $fnameerr = "First Name is required";
}
if($_POST["lastName"] == "") {
        $lnameerr = "Last Name is required";
}
if($_POST["organization"] == "") {
        $orgerr = "Organization is required";
}
if($_POST["email"] == "") {
        $emailerr ="Email is required";
}
if($_POST["phone"] == "") {
        $phoneerr ="phone number required";
}
        if(!empty($_POST['title'])) {
        $title=$_POST['title'];
        echo $title;
}
if($_POST['monday'] == null) {
        $dayerr = "Please select a day.";

}
?>



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
						<td><a href = "cancel.php?var=<?php echo $result['phone']; ?>"></td>
					</tr>
				//Table row
				<?php
			}
			echo('</table>');
		
	
	if(!$_POST || $valid == false)
	{
	?>
		<h1>FSOS Registration</h1>
		<form method="POST">
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
<?php echo $fnameerr;?> </td>


 </td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
        <td></td>
        <td><input name="submit" type="submit"></td>
        <td><input name="reset" type="reset"></td>
        </tr>
<?php echo "}" ;?>
  </form>
  </body>
</html>

