<?php
$postalerr ="";

if(isset($_POST["submit"]))
{
$trimmed = trim($_POST["postal"]);
$postal = isset($_POST["postal"]) ? $_POST["postal"]: "";
if($_POST["postal"] == "") {
        $postalerr = "Seneca code is required";
}
if(!preg_match('/[A-Z]{3}\d{3}[A-Z]{1,3}/', $trimmed)) {
        $postalerr = "Invalid seneca Code";
}else{
echo $trimmed." is valid".<br>;
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
        <td>Seneca Code:</td>
        <td><input name="postal" type="text" value="<?php echo 
isset($_POST['postal']) ? $_POST['postal'] : '' ?>"> <?php echo 
$postalerr;?></td>
        </tr>
        <tr>
<br>    <input name="submit" type="submit"/>
        </tr>
  </form>
  </body>
</html>

