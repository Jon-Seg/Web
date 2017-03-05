<?php
include("includes/library.php");
//delete entry from db
		$j=0;
		$lines = file('/home/int322_162a28/secret/topsecret');
		$db = trim($lines[$j++]);
		$user = trim($lines[$j++]);
		$pw = trim($lines[$j++]);
		$dbname = trim($lines[$j++]);
		$con = mysqli_connect($db,$user,$pw,$dbname) or die('Could not connect to DB: ' . mysqli_error($con));    
        $id = $_GET['id'];
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
        //$SQL = "UPDATE inventory SET deleted='n' WHERE id='$id';";
        $SQL = "DELETE FROM inventory WHERE id='$id';";
        $result = mysqli_query($con,$SQL) or die('Insert query failed' . mysqli_error($con));
        header("Location: view.php");
        }
        else
        {
            header("Location: view.php");
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