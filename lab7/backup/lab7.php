<?php
$fileName ="deadman.txt";
$file = fopen("deadman.txt", "w+");
$size = filesize($fileName);
$text = $file;
if($_POST['edit']) fwrite($file, $_POST['edit']);
//$text = fread($file, $size);
fclose($file);
?>
<html>
   <head>
      <title>Lab 7</title>
      <link rel="stylesheet" type="text/css" 
href="includes/mystyle.css">
   </head>
   <body>
<form method="post" >
<textarea name="edit" cols="40" rows="10"><?=$text?></textarea>
<input type="submit" value="edit"/>
</form>
   </body>
</html>

