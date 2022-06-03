<?php 
//this page is to add a user in the admins table and this is directed from admin_newadmin.php
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	$c_pass = $_POST["C_password"];
	if($pass != $c_pass){
		header("Location: admin_newadmin.php?message=password doesnt match");
		exit();
	}
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM admin WHERE username = '$uname'";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//to check if the username was found in the database , if not then we will exit and provide a text f not found in the webpage
	if(!empty($ans)){
		header("Location: admin_newadmin.php?message=choose a unique username");
		exit();
	}
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO admin(username,hashed_password) VALUES('$uname','$hash')";
	if(mysqli_query($conn,$sql)){
		header("Location: admin_newadmin.php?message=successfully added that account in admins");
	}
	else{
		echo "connection error!!". mysqli_error($conn);
	}
	
 ?>
