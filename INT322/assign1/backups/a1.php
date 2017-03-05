<?php
	include_once("includes/library.php");
	//regex values
	$rname    = "/(^\s*$)|([^a-z\-;\:\,\'0-9\s])/i";
	$rdesc    = '/^[-\.,\'\s[:alnum:]]*$/';
	$rsupp    = '/^[a-z0-9 -]+$/';
	$rcost    = '/^[0-9]+\.{1}[0-9][0-9]/';
	$rprice   = '/^[0-9]+\.{1}[0-9][0-9]/';
	$ronhand  = '/^\d*$/';
	$rreorder = '/^\d*$/';
	
	if ($_GET) {
		$vErr         = "";
		$laptopErr     = "";
		$descErr      = "";
		$suppErr      = "";
		$costErr      = "";
		$priceErr     = "";
		$onHandErr    = "";
		$reorderErr   = "";
		$backorderErr = "";
		$isValid = true;
		$laptop = isset($_GET["laptop"]) ? $_GET["laptop"] :
		"";
		$laptop = trim($laptop);
		$description   = isset($_GET["description"]) ? $_GET["description"] :
		"";
		$description = trim($description);
		$supplierCode  = isset($_GET["supplierCode"]) ? $_GET["supplierCode"] :
		"";
		$supplierCode = trim($supplierCode);
		$cost          = isset($_GET["cost"]) ? $_GET["cost"] :
		"";
		$cost  = trim($cost);
		$price         = isset($_GET["price"]) ? $_GET["price"] :
		"";
		$price = trim($price);
		$onHand        = isset($_GET["onHand"]) ? $_GET["onHand"] :
		"";
		$onHand = trim($onHand);
		$reorderPoints = isset($_GET["reorderPoints"]) ? $_GET["reorderPoints"] :
		"";
		$reorderPoints = trim($reorderPoints);
		$backorder     = isset($_GET["backOrder"]) ? $_GET["backOrder"] :
		"";
		$backorder = trim($backorder);
	}

	
	if (isset($_GET["submit"])) {
		
		if (empty($_GET["laptop"])) {
			$laptopErr = "<span class='s1'>* Please enter a manufacturer name (ex: Acer, Lenovo, HP)</span>";
			$isValid  = false;
		}

		
		if (preg_match($rname, $laptop)) {
			$laptopErr = "<span class='s1'>* Invalid laptop name, try again</span><BR>";
			$isValid  = false;
		}

		
		if (empty($_GET["description"])) {
			$descErr = "<span class='s1'>* Please enter a description of the product</span><br>";
			$isValid = false;
		}

		
		if (!preg_match($rdesc, $description)) {
			$descErr = "<span class='s1'>* Invalid description, try again</span><br>";
			$isValid = false;
		}

		
		if (!preg_match($rsupp, $supplierCode)) {
			$suppErr = "<span class='s1'>* Invalid supplier code, try again (letters, spaces, number or dash allowed) </span><br>";
			$isValid = false;
		}

		
		if (empty($_GET["supplierCode"])) {
			$suppErr = "<span class='s1'>* Please enter a valid supplier code</span><br>";
			$isValid = false;
		}

		
		if (!preg_match($rcost, $cost)) {
			$costErr = "<span class='s1'>* Invalid cost, try again (Format: 00.00)</span><br>";
			$isValid = false;
		}

		
		if (empty($_GET["cost"])) {
			$costErr = "<span class='s1'>* Please enter the item cost</span><br>";
			$isValid = false;
		}

		
		if (!preg_match($rprice, $price)) {
			$priceErr = "<span class='s1'>* Invalid price, try again (Format: 00.00)</span><br>";
			$isValid  = false;
		}

		
		if (empty($_GET["price"])) {
			$priceErr = "<span class='s1'>* Please enter the item price</span><br>";
			$isValid  = false;
		}

		
		if (!preg_match($ronhand, $onHand)) {
			$onHandErr = "<span class='s1'>* Invalid onhand value, try again (Numeric only)</span><br>";
			$isValid   = false;
		}

		
		if (empty($_GET["onHand"])) {
			$onHandErr = "<span class='s1'>* Please enter how many items on hand </span><br>";
			$isValid   = false;
		}

		
		if (!preg_match($rreorder, $reorderPoints)) {
			$reorderErr = "<span class='s1'>* Invalid reorder value, try again (Numeric only)</span><br>";
			$isValid    = false;
		}

		
		if (empty($_GET["reorderPoints"])) {
			$reorderErr = "<span class='s1'>* Please enter the number of reorder points</span><br>";
			$isValid    = false;
		}

	}

	
	if ($_GET && $isValid)    //connect to db
	{
		//        echo "Info is valid";
		$fmodel = file('includes/defaultstock/laptop.txt');
		$fmanu = file('includes/defaultstock/manu.txt');
		$fversion = file('includes/defaultstock/version.txt');
		$fprice = file('includes/defaultstock/price.txt');
		$fcost = file('includes/defaultstock/cost.txt');
		$fonhand = file('includes/defaultstock/onhand.txt');
		$freorderpoint = file('includes/defaultstock/reorder.txt');
		$fbackorder = file('includes/defaultstock/backorder.txt');
		//$table2 = new table();
		//$table2->deleteTable();
		/**
	for($i=0;$i<count($fmodel);$i++)
	{
		insertDB($fmodel[$i],$fmanu[$i],$fversion[$i],$fprice[$i],$fcost[$i],$fonhand[$i],$freorderpoint[$i],$fbackorder[$i]);
	}
		**/$table = new table();
		$table->insertDB2($laptop,$description,$supplierCode,$cost,$price,$onHand,$reorderPoints,$backorder);
	}

	//ends if[submit]
	?>
      <div class="d2">
         <h1 class="title" >Jonathan's Used Laptop Store</h1>
         <hr class="cloud">
         <BR>
         <div class="d1">
            <br><br>
            <form method="GET" id="store" action="add.php">
               <hr class="cloud">
               <div class="button">
                  <table class="left">
                     <tr>
                        <td>
                           <p class="title2">Add stock to inventory  /  View store inventory:</p>
                        </td>
                        <td><a href="http://zenit.senecac.on.ca/~int322_162a28/assign1/add.php?" class="button2">Add</a></td>
                        <td><a href="http://zenit.senecac.on.ca/~int322_162a28/assign1/view.php?" class="button2">View</a></td>
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
                        </textarea><?php if(isset($descErr)){echo $descErr;} ?>
                     </td>
                  </tr>
                  <tr>
                     <td class="font1">Supplier Code :</td>
                     <td><input name="supplierCode" 
                        type="text" value="<?php if (isset($_GET["supplierCode"]) ) print $_GET["supplierCode"];?>"><?php if(isset($suppErr)){echo $suppErr;}?></td>
                  </tr>
                  <tr>
                     <td class="font1">Cost : </td>
                     <td><input name="cost" type="text" value="<?php if (isset($_GET["cost"]) ) print $_GET["cost"];?>"><?php if(isset($costErr)){echo $costErr;}?></td>
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
               <hr class="cloud">
               <div class="button">
                  <table class="right">
                     <tr>
                        <td><input type="submit" name="submit" value="Submit"></td>
                        <td><a href="http://zenit.senecac.on.ca/~int322_162a28/assign1/add.php?" class="button2">Reset</a></td>
                        <td>
                           <p class="title3">Submit form data  /  Reset form data:</p>
                        </td>
                     </tr>
                  </table>
               </div>
            </form>
         </div>
      </div>


