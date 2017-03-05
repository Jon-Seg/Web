<?php
	$isValid = true;
	$cName='';
	$cValue='';
    $name = "visitCount";
    if(!isset($_COOKIE[$name]))
    {
        $_COOKIE[$name] = 0;
    }
    $_COOKIE[$name] = 1 + (int) max(0, $_COOKIE[$name]);
    
    $count = intval($_COOKIE['visitCount']) + 1;
	setcookie("visitCount",$count,time() + (60*60),'/'); //1 hour
    $result = setcookie($name, $_COOKIE[$name]);
	$error = false;
	if($_POST)
	{
		$cName=trim($_POST['cName']);
		$cValue=trim($_POST['cValue']);
		if(!empty($cName))
		{
		if(!empty($cValue))
		{
			setcookie($cName,$cValue,time() + (60*60),'/');
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
    <style>
        .err
        {
            color: red;
        }
    </style>
      <title>Lab 5</title>
   </head>
   <body>
      <h1>Lab 5</h1>
      <table>
         <form method="post">
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
               <td>
                  
               </td>
			   <td><input type="submit"></td>	
            </tr>		
      </table>
	  </form>
	  <table>
		<tr>
            <th>Cookie Name</th>
            <th>Cookie Value</th>
		</tr>
        <?php
				if($error)
				{
					echo('<p class="err">' . $errMsg . '</p>');
				}
				?>
		<td>
	<?php
		foreach ($_COOKIE as $key=>$val)
		{
			echo $key . ' = ' . $val . "<br>";
		}
		?>
	  <hr>
	  <p>Welcome back - You have visited this page
	  <?php
		echo($_COOKIE['visitCount']);
		?>
	  times.
	  </p>
	  </td>
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
