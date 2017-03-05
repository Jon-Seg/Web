<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>

Title : <?php echo $_GET["title"]; ?><br>
First Name : <?php echo $_GET["firstName"]; ?><br>
Last Name : <?php echo $_GET["lastName"]; ?><br>
Organization : <?php echo $_GET["organization"]; ?><br>
Email : <?php echo $_GET["email"]; ?><br>
Phone : <?php echo $_GET["phone"]; ?><br>
Days Attending : 
<?php 
if(isset($_GET["monday"]) == "Yes")
{
	echo $_GET["monday"] ;
}
if(isset($_GET["tuesday"]) == "Yes")
{
	echo $_GET["tuesday"];
}

?> <br>

T-Shirt Size : <?php echo $_GET["t-shirt"]; ?><br>


</body>
</html>
