<?php 
// this page is to add the a new subject
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	if(!empty($_GET['update'])) {
    	$id = $_GET['update'];
    	$menu_name = $_POST['menu_name'];
		$position = $_POST['position'];
		$visibility = $_POST["input_user"];
    	// echo "Use a unique menu_name or position!" ;
    	// echo htmlspecialchars($id);
    $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
     	$sql = "UPDATE subjects SET menu_name = '$menu_name',position ='$position', visible= '$visibility'   WHERE id ='$id'";
	    // echo $sql;
	    $result = mysqli_query($conn,$sql);
	    // echo $result;
	    if($result!=0){
	          echo "Update successfull!!";
	          echo "<h3><a href='admin_page.php'>Return back</a></h3>";
	          exit();
	    }
	    echo "There has been some errors so please retry!";
	    echo "<h3><a href='admin_page.php'>Return back</a></h3>";
	    exit();
	}
    
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	$visibility = $_POST["input_user"];
	// not working!!! part!!
	if(is_null($visibility) || is_null($menu_name) || is_null($position)){
		echo "fill all the part as well!";
		exit();
	}

$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM subjects WHERE menu_name = '$menu_name' OR position = '$position' ";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//to check if the username was found in the database , if not then we will exit and provide a text f not found in the webpage
	if(!empty($ans)){
		header("Location: new_subject.php?message=error_position_or_menuname_is_same!");
		exit();
	}
	//now to save the given values in the databse
	$sql = "INSERT INTO subjects(menu_name,position,visible) VALUES('$menu_name','$position','$visibility')";
	if(mysqli_query($conn,$sql)){
		echo "success!!!";
		header("Location: new_subject.php?message=success");
	}
	else{
		echo "connection error!!". mysqli_error($conn);
	}
?>
