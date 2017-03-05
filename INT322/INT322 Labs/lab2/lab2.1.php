<script>
function validate(postal) {
	if (document.valid.postal.value == "" || 
document.valid.postal.value == 
null || 
document.valid.postal.value == "Postal Code" || 
document.valid.postal.value.length > 7) { 
alert("Please fill in postcal code. Should only enter 7 characters");
document.valid.postal.focus();
return false;
}
return validate2(postal);
}
function validate2(postal) {
var regex = /^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/;
if (regex.test(document.valid.postal.value) == false) {
alert("Input valid postal code");
document.valid.postal.focus();
return false;
}
return true;
}
</script> 
<!DOCTYPE html>
 <html>
  <head>
    <title>Postal Code & Phone Number Validator</title> 
 </head>
  <body>
    <h1>Postal Code & Phone Number Validator</h1> 
  <form method="post" name="valid">
	<tr>
    	<td>Postal Code:</td>
	<td><input name="postal" type="text" value=""></td>
	</tr>
	<tr>
	<td><input name="submit" type="submit" 
onclick="JavaScript:validate(postal)"/></td>
	</tr>
  </form>
  </body>
</html>


