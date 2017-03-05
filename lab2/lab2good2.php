<?php
$postalerr ="";
$phoneerr ="";
$iderr ="";
if(isset($_POST["submit"]))
{
$trimmed1 = trim($_POST["phone"]);
$phone = isset($_POST["phone"]) ? $_POST["phone"]: "";
if($_POST["phone"] == "") {
        $phoneerr = "Phone Number is required";
}
if(!preg_match('/^[(]?[0-9]{3}[)]?[\s-|null]?[0-9]{3}[\s-|null]?[0-9]{4}$/', 
$trimmed1)) 
{
        $phoneerr = "Invalid Phone Number";
}else{
echo $trimmed1." is valid";
}
$trimmed2 = trim($_POST["postal"]);
$postal = isset($_POST["postal"]) ? $_POST["postal"]: "";
if($_POST["postal"] == "") {
        $postalerr = "Postal code is required";
}
if(!preg_match('/^[a-zA-Z0-9]{3}( )?[a-zA-Z0-9]{3}$/', $trimmed2)) {
        $postalerr = "Invalid Postal Code";
}
$trimmed3 = trim($_POST["id"]);
$id = isset($_POST["id"]) ? $_POST["id"]: "";
if($_POST["id"] == "") {
        $iderr = "Seneca code is required";
}
if(!preg_match('/[A-Z]{3}\d{3}[A-Z]{1,3}$/', $trimmed3)) {      
        $iderr = "Invalid seneca Code";
}else{
echo $trimmed3." is valid";
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
        <td><input name="phone" type="text" value="<?php echo 
isset($_POST['phone']) ? $_POST['phone'] : '' ?>"> <?php echo 
$phoneerr;?></td>
<br><td>Postal Code:<input name="postal" type="text" value="<?php echo
isset($_POST['postal']) ? $_POST['postal'] : '' ?>"> <?php echo      
$postalerr;?> 
</td>
<br><td>Seneca ID:<input name="id" type="text" value="<?php echo
isset($_POST['id']) ? $_POST['id'] : '' ?>"> <?php echo
$iderr;?>
</td>
        </tr>
        <tr>
<br>    <input name="submit" type="submit"/>
        </tr>
  </form>
  </body>
</html>

