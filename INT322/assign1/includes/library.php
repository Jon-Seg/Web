<?php
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
	}
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