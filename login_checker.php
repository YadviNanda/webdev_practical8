<?php 
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	function return_back(){
		header("Location: admin.php");
	}
	// this isnt required!!
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	//this is the sql query for getting the data from the table about the user
	$sql = "SELECT * FROM admin WHERE username = '$uname'";
	// print($sql);
	$result = mysqli_query($conn,$sql);
	// print_r($result);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// print_r($ans);
	//to check if the username was found in the database , if not then we will exit and provide a text of not found in the webpage
	if(empty($ans)){
		return_back();
	}
	//if username is found we will compare the password with the given input of the password
	//and then use function pasword_verify to check if it is correct
	$hashed_password = $ans[0]['hashed_password'];
	if (!empty($hashed_password)){
		$re = password_verify($pass, $hashed_password);
		// echo "$re"
		if($re){
			// we will start the session and save a variable then we will move to the other page
			session_start();
			$_SESSION["power"] = "admin";
			header("Location: admin_page.php");
		}
		else{
			return_back();	
		}
	}
	//this is to covert the password into a hash
	// $pass = $_POST['password'];
	// $hash = password_hash($pass, PASSWORD_DEFAULT);
	// // var_dump($hash);
	// echo "The password is $pass and the hash is $hash";
?>
