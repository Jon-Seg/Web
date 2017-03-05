<?php
//require('deadman.txt');
include('myClasses.php');
$file = 'lab7.php';
$read = 'deadman.txt';
$regex1="/(wh*)/";
$fp=fopen($read,"r+");
fseek($fp, 0, SEEK_SET);
$data = fread($fp, 4096);
if (isset($_POST['text']))
{
    file_put_contents($data, $_POST['text']);
    header(sprintf('Location: %s', $file));
    exit();
}
$db = new DBLink('int322_162a28');
$data = preg_replace('/\([^)]*\)/', '*wh*',$data);

fseek($fp,"782", SEEK_SET);
$data2 = fread($fp, 4096);
$data = preg_replace('/wha(.)/', 'which', $data);

$postEditCount = substr_count($data,'*wh*');
$result = $db->sqlQuery("INSERT INTO  `int322_162a28`.`editing` (
`preedit` ,
`postedit`,
`selection`)
VALUES ('".preg_match_all('/(wh*)/',$data)."','".substr_count($data,'*wh*')."', ".preg_match_all('/wha(.)/',$data2).");");
$test = preg_match_all('/wha(.)/',$data);
echo $test;
var_dump($data);
fclose($fp);

?>
<html>
   <head>
      <title>Lab 7</title>
      <link rel="stylesheet" type="text/css" 
href="includes/mystyle.css">
   </head>
   <body>
    <h1>Text Editor:</h1>
    <form action="" method="post">
<textarea name="text" cols="100" rows="30"><?php echo htmlspecialchars($data) ?></textarea>
<input type="submit" value="Edit Contents"/>
</form>
   </body>
</html>
