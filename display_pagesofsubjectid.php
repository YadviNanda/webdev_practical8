
<?php 
	include "header.php";
?>
<?php 
//this apage is to add a new admin
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	if(!empty($_GET['message'])) {
      $message = $_GET['message'];
      echo htmlspecialchars($message);
  	}
?>
<?php 
// in this we will take the id provided to us by that link and we wil show all the pages that are there in the given subject
	$id = $_GET["id"];
	// echo "id is $id";
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM pages WHERE subject_id ='$id'";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	//to check if the username was found in the database , if not then we will exit and provide a text f not found in the webpage
	if(empty($ans)){
		header("Location: display_subjectpages.php?message=there are no pages for is $id");
		exit();
	}
	// print_r($ans);

?>
<?php foreach ($ans as $value) {  
 			if($value['visible']!= 'Yes'){
 				continue;
	 		}
	 		// testing
	 		// print_r($value);

 		?>
			<ul>
				<li>
				<?php
				echo htmlspecialchars($value['menu_name']);
				?>
				-->
				<?php  echo htmlspecialchars($value['position']);
				 ?>
				-
				<?php
				echo htmlspecialchars($value['visible']);
				?>
				<br>
				<a href="delete_pagewithid.php?id=<?php echo $value['id']; ?>">Delete</a>
				</li>

			</ul>
		<?php } ?> 
		</div>
		<!-- return back to the previous page -->
<h3><a href="display_subjectpages.php">Return back</a></h3>
<?php include "footer.php"; ?>
