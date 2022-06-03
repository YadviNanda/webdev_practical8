<?php 
// this page is for deleting theselected page according to the id

	session_start(); 
	if($_SESSION["power"]!= "admin"){
		// return_back(); 
	}

	$id = $_GET['id'];
	echo $id;
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM pages WHERE id ='$id'";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//to check if the username was found in the database , if not then we will exit and provide a text f not found in the webpage
	if(empty($ans)){
		header("Location: display_pagesodsubject.php?message=there are no pages for this $id");
		exit();
	}
	// incomplete function need to be defined fully use test variables!!
	$sql = "DELETE FROM pages WHERE id ='$id'";
	$result = mysqli_query($conn,$sql);




?>
