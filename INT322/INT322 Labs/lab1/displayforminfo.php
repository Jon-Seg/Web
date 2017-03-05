<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
Title : <?php echo $_POST["title"]; ?><br>
First Name : <?php echo $_POST["firstName"]; ?><br>
Last Name : <?php echo $_POST["lastName"]; ?><br>
Organization : <?php echo $_POST["organization"]; ?><br>
Email : <?php echo $_POST["email"]; ?><br>
Phone : <?php echo $_POST["phone"]; ?><br>
Days Attending : 
<?php 
if(isset($_POST["monday"]) == "Yes")
{
	echo $_POST["monday"] ;
}
if(isset($_POST["tuesday"]) == "Yes")
{
	echo $_POST["tuesday"];
}

?> <br>

T-Shirt Size : <?php echo $_POST["t-shirt"]; ?><br>


</body>
</html>
