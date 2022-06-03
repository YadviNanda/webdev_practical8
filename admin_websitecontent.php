<?php  include "header.php"; ?>
<?php  
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM subjects";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<?php 
	//admin subjects pages are the table names!!
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM subjects";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// print_r($ans);
	// echo "<br><br><br><br>";
	$sql2 = "SELECT * FROM pages";
	$result2 = mysqli_query($conn,$sql2);
	//$ans contails the values of the sql query resutl
	$ans2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
	// print_r($ans2);
	?>
<div class="main">
<div class="sidebar">
	<a href="admin_page.php">Main Menu</a>
	<?php 
	foreach ($ans as $subject ) {
		// will only diplay all the pages!! as for the admin we need to be able to do that
		if($subject['visible'] == "Yes" OR 1==1){
		// print_r($subject);
?>

		<a href="?update=<?php echo $subject['id']; ?>"><h2><?php echo $subject["menu_name"]; ?></h2></a>
		<?php 
			echo "Pages under this:";
			// echo "<h2>$subject['menu_name']</h2>";
			?>
			<!-- in this we are givin the id of the subject to this unordered list so that we can use the js function made by us to hide the code! -->
			<ul>
			<?php 
			foreach ($ans2 as $pages) {


				// this is the condition checker that if the subject_id is the same or if that page is
				// under this subject!
				if($subject["id"] == $pages["subject_id"]){
		?>		
		<a href="display_pagewithid.php?id=<?php  echo $pages['id']?>"><li><?php echo $pages['menu_name']; ?></li></a>
			<?php 
				}
			}
			// this is to close the ul tag and make a list of the pages under the given 
			// subeject
			echo "</ul>";
		}
	}
?>
</div>
<!-- end of sidebar content -->
		<div class="main_content">
			<?php 
				if(!empty($_GET['update'])){
				$id = $_GET['update'];
				$sql = "SELECT * FROM subjects WHERE id ='$id'";
				// echo $id;
				// echo $sql;
				$result = mysqli_query($conn,$sql);
				//$ans contails the values of the sql query resutl
				$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
				if(empty($ans)){
					echo "Wrong id!";
					// header("Location: new_subject.php?message=error_position_or_menuname_is_same!");
					exit();
				}
				echo "<h1>Menu name:".$ans[0]['menu_name']."</h1>";
				echo "<p>Position:".$ans[0]['position']."<br> Visibility:".$ans[0]['visible']."</p>";
				echo "<a href='update_subjectfromid.php?id=$id'> Update</a><br>";
				echo "<a href='create_newpageforsubject.php?id=$id'>Insert a new page</a>";

				}
			?>
	<h4><a href="new_subject.php">Add Subject</a></h4>
</div>
<!-- end of main content -->
</div>
<!-- end of main div -->
<?php include "footer.php"; ?>
