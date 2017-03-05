<?php
include('myClasses.php');
?>
<html>
   <head>
      <title>Lab 6</title>
	  <link rel="stylesheet" type="text/css" href="includes/mystyle.css">
   </head>
   <body>
		<h3>Test Menu:</h3>
			  <hr>
    <table>
		<br><br><br><br><br><br><br><br><br><hr>
        <?php echo CNavigation::GenerateMenu($menu);?>
    </table>
   </body>
</html>

