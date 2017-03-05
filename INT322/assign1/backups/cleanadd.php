<?php

$phoneErr ="";
$descErr ="";
$suppErr ="";
$costErr ="";
$priceErr ="";
$onHandErr ="";
$reorderErr ="";
$backorderErr ="";

if(isset($_GET["submit"]))
{
$phone = isset($_GET["phone"]) ? $_GET["phone"]: "";
$description = isset($_GET["description"]) ? $_GET["description"]: "";
$supplierCode = isset($_GET["supplierCode"]) ? $_GET["supplierCode"]: "";
$cost = isset($_GET["cost"]) ? $_GET["cost"]: "";
$price = isset($_GET["price"]) ? $_GET["price"]: ""; 
$onHand = isset($_GET["onHand"]) ? $_GET["onHand"]: ""; 
$reorderPoints = isset($_GET["reorderPoints"]) ? $_GET["reorderPoints"]: ""; 
$backorder = isset($_GET["backOrder"]) ? $_GET["backOrder"]: ""; 

if($_GET["phone"] == "") {
	$phoneErr = "Please choose a phone model : ";
}
if($_GET["description"] == "") {
	$descErr = "Please enter a description  : ";
}
if($_GET["supplierCode"] == "") {
	$supplierErr = "Please choose a  : ";
}
 

}//ends if[submit]
?>

<html>
  <head>
    <title>Jonathans Used Mobile Store</title>
  </head>
  <body>
		<h1>Jonathans Used Mobile Store</h1>
		<form method="GET" id="store">
			<table>
			<tr>
		    	<td valign="top">Model : </td>
				<td>
					<table>
						<tr>
							<td><input type="radio" name="phone" value="IPhone" <?php if(($_GET['phone']) == "IPhone") echo "CHECKED" ?>>IPhone</td>
						</tr>
						<tr>
							<td><input type="radio" name="phone" value="Android" <?php 
if(($_GET['phone']) == "Android") echo "CHECKED" ?>>Android</td>
						</tr>
						<tr>
							<td><input type="radio" name="phone" value="BlackBerry" <?php
if(($_GET['phone']) == "BlackBerry") echo "CHECKED" ?>>BlackBerry</td>
						<tr>
							<td><input type="radio" name="phone" value="Windows" <?php
if(($_GET['phone']) == "Windows") echo "CHECKED" ?>>Windows</td>
<td> </td><td> </td><td> </td><td> </td>
<td> </td><td> </td><td> </td><td> </td>
<td> </td><td> </td><td> </td><td> </td>
<td> </td><td> </td><td> </td><td> </td>
<td> </td><td> </td><td> </td><td> </td>


<td><button type="button" id="add">Add</button></td>
<td><button type="button" id="viewall">View All</button></td>
						</tr>

					</table>
				</td>
			</tr>
			<tr>
		    	<td>Description : </td>
				<td><textarea name="description" 
form="store"> <?php if(isset($_GET['description'])){ $description = 
$_GET['description'];}?>
			</textarea>
			</td>
			</tr>
			<tr>
		    	<td>Supplier Code :</td>
				<td><input name="supplierCode" 
type="text" value=""<?phpif(isset($_GET['supplierCode'])){ $supplierCode 
= $_GET['supplierCode'];}?></td>
			</tr>
			<tr>
		    	<td>Cost : </td>
				<td><input name="cost" type="text" value=""

			</tr>
			<tr>
		    	<td>Price : </td>
				<td><input name="price" type="text" 
value=""<?phpif(isset($_GET['price'])){ $price
= $_GET['price'];}?></td>
			</tr>
			<tr>
		    	<td>On Hand : </td>
				<td><input name="onHand" type="text" 
value=""<?phpif(isset($_GET['onHand'])){ $onHand
= $_GET['onHand'];}?></td>
			</tr>
			<tr>
		    	<td>Reorder Points : </td>
				<td><input name="reorderPoints" type="text" 
value=""<?phpif(isset($_GET['reorderPoints'])){ $reorderPoints
= $_GET['reorderPoints'];}?></td>
			</tr>
			<tr>
		    	<td>Back Order : </td>
				<td><input name="backOrder" type="text" 
value=""<?phpif(isset($_GET['reorderPoints'])){ $reorderPoints
= $_GET['reorderPoints'];}?></td>
			</tr>


			<tr><td><br></td></tr>
			<tr>
				<td></td>

				<td><input name="submit" type="submit"></td>
				<tr>
			</tr>
		</form>
	  </body>
</html>
