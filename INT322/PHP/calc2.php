<!Doctype html>
<html>
<head>
<title>Int322 lesson 3</title>
</head>

<body>
<?php
echo "My first php lesson with Dr. James"."<BR>";
?>
<?php
$x=4;
$y=5;
$z=$x*$y;
$m=$x%$y;
$p=$x/$y;
echo "X multiplied by y is : ".$z."<BR>";
echo "X modular y is : ".$m."<BR>";
echo "X divided by y is : ".$p."<BR>";
?>
<?php
function myTest() {
    $x=3;
    echo "<p>variable inside function is : $x</p>"; }
    myTest();
     echo "<p>variable outside function is : $x</p>"; 
?>
<?php
$x = 4;
$y = 20;
function myfunc(){
echo $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}
myfunc();
echo $y;
?>
</body>
</html>