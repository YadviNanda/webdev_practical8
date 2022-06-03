<?php include "header.php"; ?>
<script type="text/javascript">
		function run(subject_id) {
			// we have to make a function to display the undeline text
			// alert(subject_id)
			// we are getting the element we need to hid by using this!!
			var x =document.getElementById(subject_id)
			// alert(x)
			// var x = document.getElementById("myDIV");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";
			  }
		}
	</script>
	<div class="main">
	<div class="sidebar">
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
	foreach ($ans as $subject ) {
		// will only diplay the visibile ones
		if($subject['visible'] == "Yes"){
		// print_r($subject);
?>
		<a href="#"><h2 onclick="run(<?php echo $subject["id"]; ?>)"><?php echo $subject["menu_name"]; ?></h2></a>
		<!-- <br> -->
			<!-- in this we are givin the id of the subject to this unordered list so that we can use the js function made by us to hide the code! -->
			<ul id="<?php echo $subject["id"]; ?>" display = "none">

			<?php 
			foreach ($ans2 as $pages) {

				// this is the condition checker that if the subject_id is the same or if that page is
				// under this subject!
				if($subject["id"] == $pages["subject_id"]){
		?>
			
				
		<a href="?id=<?php  echo $pages['id']?>"><li><?php echo $pages['menu_name']; ?></li></a>
				<!-- <p><?php  echo $pages['content'];?></p> -->

			
			
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
<div class="main_content">
	<?php 
	if(!empty($_GET['id'])) {
	  	$page_id = $_GET['id'];
	  	// echo htmlspecialchars($page_id);

	  	// we are going to start the main display part
	  $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
		$sql = "SELECT * FROM pages WHERE id =$page_id";
		$result = mysqli_query($conn,$sql);
		//$ans contails the values of the sql query resutl
		$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
		// print_r($ans);
		if($ans[0]['visible'] != "Yes"){
			echo "<h1>Wrong access!!</h1>";
			// echo "<a href='index.php'>Go back</a>";
			exit();
		}
	?>
		<div class="page">
			<h2>Page: <br><?php echo $ans[0]["menu_name"] ?></h2>
			<p style="font-size: 18px">Content:<br><strong><?php echo $ans[0]["content"]; ?></strong></p>
		</div>
	<?php 
		}
	?>
		<!-- in this we will put all the main parts -->
</div>
</div>
<?php include "footer.php"; ?>
