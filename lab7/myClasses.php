<?php
$menu = array(
    'login' => array('text'=>'Login', 'url'=>'logout.php'),
    'signup' => array('text'=>'Signup', 'url'=>'testDB.php'),
	 'testmenu' => array('text' => 'Test Menu', 'url'=>'testMenu.php'),
    'forgotpassword' => array('text'=>'Forgot Password?', 'url'=>'forgotpassword.php'),
    'protectedstuff' => array('text'=>'Protected Stuff', 'url'=>'protectedstuff.php'),
    'page2' => array('text'=>'Page 2', 'url'=>'page2.php'),
	);

	class CNavigation {
    public static function GenerateMenu($items){
        $html = "<nav>\n";
        foreach($items as $item) {
            $html .= "<td><a class='button' href='{$item['url']}'>{$item['text']}</a></td>\n";
        }
        $html .="</nav>\n";
        return $html;
    }
}


function removeSpecialChars($input) {
    $input = trim($input);
    $input = stripslashes($input);
    //$input = mysqli_real_escape_string($input);
    //$input = htmlspecialchars($input);
    return $input;
}

	function passGen($user, $pass){
		$intSalt = md5(uniqid(rand(), true));
		$salt = substr($intSalt, 0, MAX_LENGTH);
		return crypt($user, $pass . $salt);
	}


class DBLink
{
    private $conn;
	private $result;
	public
    function __construct($dbnm)
    {
	$lines = file('/home/int322_162a28/secret/topsecret');
    $j=0;
	$host = trim($lines[$j++]);
	$user = trim($lines[$j++]);
	$pass = trim($lines[$j++]);
	$dbnm = trim($dbnm);
	$conn = mysqli_connect($host,$user,$pass,$dbnm) or die("Error connecting to DB" . mysqli_error($conn));
    $this->conn = $conn;
	}
	
	public
	function sqlQuery($sql)
	{
		$result = mysqli_query ($this->conn, $sql) or die ('Query Failed' . mysqli_error($this->conn));
		$this->result = $result;
		return $result;
	}
	
	public
	function emptyResult()
	{
	if(!(mysqli_num_rows($this->result))){
		return true;
	}
	else
	{
		return false;
	}
	}
	
	public
	function __destruct()
	{
		mysqli_close($this->conn);
	}
}

class loginInfo
{
	public $error;
	public $errMsg;
	public $username;
	public $password;
	
	public function validate()
	{
		if(!empty($this->username))
		{
			if(!empty($this->password))
			{
				$this->error = false;
				return true;
			}
			else
			{
				//if pass not entered
				$this->error = true;
				$this->errMSg = 'Error : Empty password field';
				return false;
			}
		}
		else
		{
			//if user not entered
			$this->error = true;
			$this->errMsg = 'Error : Empty username field';
			return false;
		}
	}
}
/*
Student Declaration
I/we declare that the attached assignment is my/our own work in accordance
with Seneca Academic Policy. No part of this assignment has been copied
manually or electronically from any other source (including web sites) or
distributed to other students.
Name ----Jonathan Seguin-------------------
Student ID ---035472158------------
*/
?>
