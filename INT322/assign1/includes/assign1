<?php
	class Html {
		public function htmlHead() {
        ?>
        <html>
        <head>
                  <title>Jonathans Used Laptop Store</title>

                  <link rel="stylesheet" type="text/css" href="includes/mystyle.css">
        </head>
        <body>
        <?php
    }
    public function htmlBody() {
        ?>
        
        <?php
    }
    public function htmlFooter() {
        ?>
            <footer>
                <p>footer</p>
            </footer>
        </body>
        </html>
        <?php
    }
}
	
	class table {
	public function insertDB2($laptop,$description,$supplierCode,$cost,$price,$onHand,$reorderPoints,$backorder)
	{
	$j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$db = trim($lines[$j++]);
	$user = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbname = trim($lines[$j++]);
	$con = mysqli_connect($db,$user,$pw,$dbname) or die('Could not connect to DB: ' . mysqli_error($con));
    $SQL = 'INSERT INTO inventory SET itemName="' . trim($laptop) . '",description="' . trim($description) . '",supplierCode="' . trim($supplierCode) . '",cost="' . trim($cost) . '",price="' . trim($price)  . '",onHand="' . trim($onHand) . '",reorderPoint="' . trim($reorderPoints) . '",backorder="' . trim($backorder) . '"';
	mysqli_query($con,$SQL) or die('Insert query failed' . mysqli_error($con));

	mysqli_close($con);
	}
	public function deleteTable()
	{
	$j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$db = trim($lines[$j++]);
	$user = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbname = trim($lines[$j++]);
	$con = mysqli_connect($db,$user,$pw,$dbname) or die('Could not connect to DB: ' . mysqli_error($con));
	$SQL = 'DROP TABLE inventory;';
	mysqli_query($con,$SQL) or die('Drop query failed' . mysqli_error($con));
	mysqli_close($con);
	}
	
	public function createTable()
	{
	$j=0;
	$lines = file('/home/int322_162a28/secret/topsecret');
	$db = trim($lines[$j++]);
	$user = trim($lines[$j++]);
	$pw = trim($lines[$j++]);
	$dbname = trim($lines[$j++]);
	$con = mysqli_connect($db,$user,$pw,$dbname) or die('Could not connect to DB: ' . mysqli_error($con));
	$SQL = "create table inventory (
id int zerofill not null auto_increment,
itemName varchar(40) not null,
description varchar(2000) not null,
supplierCode varchar(40) not null,
cost decimal(10,2) not null,
price decimal(10,2) not null,
onHand int not null,
reorderPoint int not null,
backOrder enum('y','n') not null,
deleted enum('y','n') not null,
primary key (id)
);";
	mysqli_query($con,$SQL) or die('Drop query failed' . mysqli_error($con));
	mysqli_close($con);
	}
	}
?>