<?php include "header.php" ?>
<?php 
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	if(!empty($_GET['message'])) {
    	$message = $_GET['message'];
    	// echo "Use a unique menu_name or position!" ;
    	echo htmlspecialchars($message);
	}
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM subjects";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// print_r($ans);
?>

<!-- this part is to print out all the values inside the array -->
<!-- this will be used to display the subjects and will check that if they are visible or not(yes/or)-->
<!-- we need to find a way to print the pages according to their postion in asc. order! -->
<!-- this part works and the condition also is being continiously checked! -->
<div class="main">
<div class="sidebar">
 		<?php foreach ($ans as $value) {  
 			if($value['visible']!= 'Yes'){
 				continue;
	 		}

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
				<a href="delete_subjectfromid.php?id=<?php echo $value["id"]; ?>">Delete subject</a>
				<br>
				<a href="update_subjectfromid.php?id=<?php echo $value["id"]; ?>">Update subject</a>
				<br>
				<a href="create_newpageforsubject.php?id=<?php echo $value["id"]; ?>">Create page under this subject</a>
				<br>
				<a href="display_pagesofsubjectid.php?id=<?php echo $value["id"]; ?>">See the pages under this</a>
				</li>

			</ul>
		<?php } ?> 
		</div>
<!-- end of sidebar content -->
		<div class="main_content">
		<h3><a href="admin_page.php">Return back</a></h3>
		</div>
<!-- end of main content -->
</div>
<!-- end of main div -->
<?php include "footer.php" ?>
