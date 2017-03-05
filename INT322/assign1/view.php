<?php
include("includes/library.php");
?>
<html>
  <head>
    	<link rel="stylesheet" type="text/css" href="includes/mystyle.css">   
<title>View inventory stock</title>
  </head>                
  <body>
		<?php
		echo '<table>';
		echo '<td><a href="http://zenit.senecac.on.ca/~int322_162a28/assign1/add.php?" class="button2">Add</a></td>';
		echo '<td><a href="http://zenit.senecac.on.ca/~int322_162a28/assign1/view.php?" class="button2">View</a></td>';
		echo '</table>';
		$j=0;
		$lines = file('/home/int322_162a28/secret/topsecret');
		$db = trim($lines[$j++]);
		$user = trim($lines[$j++]);
		$pw = trim($lines[$j++]);
		$dbname = trim($lines[$j++]);
		$con = mysqli_connect($db,$user,$pw,$dbname) or die('Could not connect to DB: ' . mysqli_error($con));
    $SQL = 'SELECT * FROM inventory;';
		$result = mysqli_query($con,$SQL) or die('Insert query failed' . mysqli_error($con));
		mysqli_close($con);
		//display data in table
		while($row = mysqli_fetch_array($result)){
		echo "<table class='t1'>";
		echo "<tr class='t1'> <th>ID</th> <th>Item Name</th><th>Description</th> <th>Supplier Code</th><th>Cost</th><th>Price</th><th>On Hand</th><th>Reorder</th><th>Backorder</th><th>Delete</th></tr>";
		echo "<tr class='t1'>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['itemName'] . '</td>';
		echo '<td>' . $row['description'] . '</td>';
		echo '<td>' . $row['supplierCode'] . '</td>';
		echo '<td>' . $row['cost'] . '</td>';
		echo '<td>' . $row['price'] . '</td>';
		echo '<td>' . $row['onHand'] . '</td>';
		echo '<td>' . $row['reorderPoint'] . '</td>';
		echo '<td>' . $row['backOrder'] . '</td>';
		echo '<td>' . $row['deleted'] . '</td>';
		echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
		echo "</tr>"; 
	}
		echo"</table>";
//loop thru db query result, display in table
/**
	 *Student Declaration
I/we declare that the attached assignment is my/our own work in accordance
with Seneca Academic Policy. No part of this assignment has been copied
manually or electronically from any other source (including web sites) or
distributed to other students.
Name ----Jonathan Seguin-------------------
Student ID ---035472158------------
	 **/
		?>
	</body>
</html>
