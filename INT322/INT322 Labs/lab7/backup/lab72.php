<?php
require("deadman.txt");
if($_POST){
    $read = fopen("deadman.txt","w+");
    $text = $_POST['edit'];
    fwrite($read, $text);
    fclose($read);
    echo"File edited:<br><br>";
    echo "File contents:<br><br>";
    $file = file("deadman.txt");
    foreach($file as $text){
        echo $text."<br>";
    }
}else{
    $file = file("deadman.txt");
echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">"; 
echo "<textarea Name=\"edit\" cols=\"50\" rows=\"10\">"; 
foreach($file as $text) { 
echo $text; 
}
echo "</textarea>";
echo "<input name=\"Submit\" type=\"submit\" value=\"Update\" />\n 
</form>"; 
} 
?>
<html>
   <head>
      <title>Lab 7</title>
      <link rel="stylesheet" type="text/css" 
href="includes/mystyle.css">
   </head>
   <body>
   </body>
</html>

