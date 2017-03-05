<?php
include_once("includes/library.php");
?>

<div class="d2">
		<h1 class="title" >Jonathan's Used Laptop Store</h1>
		<hr class="cloud"><BR>


<div class="d1">
<br><br>
		<form method="GET" id="store" action="add.php">
				<p class="title2">Add stock to inventory  /  View store inventory:</p>
		<hr class="cloud">
<div class="button">
	<table class="left"><tr>
	<td><input type="submit" name="Add" value="Add" action="add.php" /></td>
	<td><input type="submit" name="View" value="view" /></td>
	</tr>
	</table>
</div>
<table>
			<tr>
		    	<td class="font1">Manufacturer name : </td>
				<td>
					<table>
						<tr>
	<td><input type="text" name="laptop" value="<?php if(isset($_GET["laptop"])) print $_GET["laptop"]; ?>"><?php if(isset($laptopErr)){echo $laptopErr;} ?>

						</tr>

					</table>
				</td>
			</tr>
			<tr>
		    	<td class="font1">Description : </td>
				<td><textarea 
name="description"form="store"rows="2"cols="22"><?php 
if(isset($_GET["description"])) {echo $_GET["description"];} ?>
</textarea><?php if(isset($descErr)){echo $descErr;} ?></td>
			</tr>
			<tr>
		    	<td class="font1">Supplier Code :</td>
				<td><input name="supplierCode" 
type="text" value="<?php if (isset($_GET["supplierCode"]) ) print $_GET["supplierCode"]; ?>"><?php if(isset($suppErr)){echo $suppErr;} ?></td>
			</tr>
			<tr>
		    	<td class="font1">Cost : </td>
				<td><input name="cost" type="text" value="<?php if (isset($_GET["cost"]) ) print $_GET["cost"]; ?>"><?php if(isset($costErr)){echo $costErr;} 
?></td> 

			</tr>
			<tr>
		    	<td class="font1">Price : </td>
				<td><input name="price" type="text" 
value="<?php if (isset($_GET["price"]) ) print $_GET["price"]; ?>"><?php if(isset($priceErr)){echo $priceErr;} ?></td>
			</tr>
			<tr>
		    	<td class="font1">On Hand : </td>
				<td><input name="onHand" type="text" value="<?php if (isset($_GET["onHand"]) ) print $_GET["onHand"]; ?>"><?php if(isset($onHandErr)){echo $onHandErr;} ?></td>
			</tr>
			<tr>
		    	<td class="font1">Reorder Points : </td>
				<td><input name="reorderPoints" type="text" 
value="<?php if (isset($_GET["reorderPoints"]) ) print $_GET["reorderPoints"]; ?>"><?php if(isset($reorderErr)){echo $reorderErr;} ?></td>
			</tr>
			<tr>
		    	<td class="font1">Back Order : </td>
				<td><input name="backOrder" type="text" 
value="<?php if (isset($_GET["backOrder"]) ) print $_GET["backOrder"]; ?>"></td>
			</tr>
<span class="s1">* = Required Fields</span>
</table>
<p class="title3">Submit form data  /  Cancel form data:</p>
<hr class="cloud">
<div class="button">
<table class="right"><tr>
	<td><input type="submit" name="submit" value="Submit"></td>
	<td><input type="submit" name="Cancel" value="Cancel" /></td>
	</tr>
	</table>
</div>
		</form>
</div>
</div>
