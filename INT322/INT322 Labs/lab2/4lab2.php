<?php
$postalerr ="";

if(isset($_POST["submit"]))
{
$trimmed = trim($_POST["postal"]);
$postal = isset($_POST["postal"]) ? $_POST["postal"]: "";
if($_POST["postal"] == "") {
	$postalerr = "Phone Number is required";
}
if(!preg_match('/[(]?[0-9]{3}[)]?[\s-|null]?[0-9]{3}[\s-|null]?[0-9]{4}/', 
$trimmed)) 
{
	$postalerr = "Invalid Phone Number";
}else{
echo $trimmed." is valid";
}
}
?>

<!DOCTYPE html>
 <html>
  <head>
    <title>Postal Code & Phone Number Validator</title> 
 </head>
  <body>
    <h1>Postal Code & Phone Number Validator</h1> 
  <form method="post" name="valid">
	<tr>
    	<td>Phone Number:</td>
	<td><input name="postal" type="text" value="<?php echo 
isset($_POST['postal']) ? $_POST['postal'] : '' ?>"> <?php echo 
$postalerr;?></td>
	</tr>
	<tr>
<br>	<input name="submit" type="submit"/>
	</tr>
  </form>
  </body>
</html>


