<?php
	$isValid = true;
	$cName='';
	$cValue='';
	$count = intval($_COOKIE['visitCount']) + 1;
	setcookie("visitCount",$count,time() + 3600,'/');
	$error = false;
	if($_POST)
	{
		$cName=trim($_POST['cName']);
		$cValue=trim($_POST['cValue']);
		if(!empty($cName))
		{
		if(!empty($cValue))
		{
			setcookie($cName,$cValue,time() + 3600,'/');
			var_dump(headers_list());
		}
		else
		{
		$isValid = false;
		$error = true;
		$errMsg = "Error: Empty Cookie Value";
		}
	}
	else
	{
		$isValid=false;
		$error=true;
		$errMsg="Error: Empty Name Field";
}
}
?>
<!DOCTYPE html>	
<html>
   <head>
   </head>
   <body>
         <form method="post">
			<table>
            <tr>
               <td>
                  <label for="cName">Cookie Name:</label>
				  <input type="text" name="cName">
               </td>
            </tr>
            <tr>
               <td>
                  <label for="cValue">Cookie Value:</label>
                  <input type="text" name="cValue">
               </td>
			   <td><input type="submit"></td>
            </tr>
			</table>
	  </form>
	  <table>
		<tr>
		<th>Cookie Name</th>
		<th>Cookie Value</th><br>
		</tr>
		<td>
	  <hr>
	  <p>You have visited this page
	  times.
	  </p>
	  </td>
   </body>
</html>

