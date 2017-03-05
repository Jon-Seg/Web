PHP Source:
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
$name = $email = $gender = $comment = $website ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
$name = test_input($_POST["name"]); 
$email = test_input($_POST["email"]); 
$website = test_input($_POST["website"]); $comment = test_input($_POST["comment"]);
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<h2>PHP Form Validation Example</h2>
<form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name">
<br><br>
E-mail: <input type="text" name="email">
<br><br>
Website:<input type="text name="website">
<br><br>
<input type="submit">
</body>
</html>

