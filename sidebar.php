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
	<div class="sidenav">
	<?php 
	foreach ($ans as $subject ) {
		// will only diplay all the pages!! as for the admin we need to be able to do that
		if($subject['visible'] == "Yes" OR 1==1){
		// print_r($subject);
?>
		
		<a href="?id=<?php echo $subject['id']; ?>"><?php echo $subject["menu_name"]; ?></a>
		<?php 
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
		<a href="pages.php?id=<?php  echo $pages['id']?>"><li><?php echo $pages['menu_name']; ?></li></a>
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

<h4><a href="new_subject.php">Add Subject</a></h4>
<!-- <?php include "footer.php"; ?> -->
<!-- Side navigation -->
<!-- <div class="sidenav">
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div> -->

<!-- Page content -->
<div class="main">
	<?php 
		if(!empty($_GET['update'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM subjects WHERE id ='$id'";
		$result = mysqli_query($conn,$sql);
		//$ans contails the values of the sql query resutl
		$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
		if(!empty($ans)){
			echo "Wrong id!";
			// header("Location: new_subject.php?message=error_position_or_menuname_is_same!");
			exit();
		}
		// echo ""




	}


	?>
		<h1><?php echo $ans[0]['menu_name']; ?></h1>
		<p><?php echo $ans[0]['position']; ?><br><?php echo $ans[0]['visible']; ?></p>
  ...
</div>
<style type="text/css">
	 /* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 250px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
} 
</style>
