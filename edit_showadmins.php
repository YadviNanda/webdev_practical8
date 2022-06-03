<?php  include "header.php"; ?>
<?php  
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	// when the user presses the enter key! we will be doing this
	if(!empty($_GET['id'])) {
      $id = $_GET['id'];
      // echo "You have been ";
      // echo htmlspecialchars($id);
      $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
      $sql = "SELECT * FROM admin WHERE id =$id";
      $result = mysqli_query($conn,$sql);
      $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
      // print_r($ans);
      //to check if the username was found in the database , if not then we will exit and provide a text of not found in the webpage
      if(empty($ans)){
      	// give out a message or just print there are no admins on this page
		// header("Loaction: adminpage.php?message=")
		echo "Wrong id given!";
		exit();
		}
		// print_r($ans);
	?>
		<div class="main">
		<div class="sidebar">
			<a href="admin_page.php">Main Menu</a>
		</div>
		<div class="main_content">
		<!-- in this we will put all the main parts -->
		<h3><?php echo $ans[0]["username"]; ?></h3>
		<br>
		<a href="?update=<?php echo $id?>">Update</a>
		<br>
		<a href="?delete=<?php echo $id?>">Delete</a>
		</div>	
		</div>	
	<?php 

      	exit();
  	}
  	if(!empty($_GET['update'])) {
      $id = $_GET['update'];
      // echo "You have been ";
      // echo htmlspecialchars($id);
      $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
      // UPDATE table_name
	  // SET column1 = value1, column2 = value2, ...
	  // WHERE condition; 
      $sql = "SELECT * FROM admin WHERE id =$id";
      $result = mysqli_query($conn,$sql);
      $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
      // print_r($ans);
      //to check if the username was found in the database , if not then we will exit and provide a text of not found in the webpage
      if(empty($ans)){
      	// give out a message or just print there are no admins on this page
		// header("Loaction: adminpage.php?message=")
		echo "Wrong id given!";
		exit();
		}
		?>
		<div class="main">
		<div class="sidebar">
			<a href="admin_page.php">Main Menu</a>
		</div>
		<!-- end of sidebar content -->
		<div class="main_content">
		<form method="post" action="update_adminpassword.php?id=<?php echo $id; ?>">
			Password: <input type="text" name="password">
			Confirm Password:<input type="password" name="c_password">
			<input type="submit" name="sumbit">
		</form>
		</div>
		<?php 
		exit();
	}

  	
	if(!empty($_GET['delete'])) {
      $id = $_GET['delete'];
      // echo "You have been ";
      // echo htmlspecialchars($id);
      $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
      // DELETE FROM table_name WHERE condition;
      $sql = "DELETE FROM admin WHERE id =$id";
      $result = mysqli_query($conn,$sql);
	}

$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM admin";
	// print($sql);
	$result = mysqli_query($conn,$sql);
	// print_r($result);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// print_r($ans);
	//to check if the username was found in the database , if not then we will exit and provide a text of not found in the webpage
	if(empty($ans)){
		// give out a message or just print there are no admins on this page
		// header("Loaction: adminpage.php?message=")
		echo "There are no users stored in the database!";
		exit();
	}
	?>
	<div class="main">
	<div class="sidebar">
		<a href="admin_page.php">Main Menu</a>
	</div>
	<div class="main_content">
	<!-- in this we will put all the main parts -->
	<?php
	foreach ($ans as $user) {
		echo $user["username"];
		echo "<a href='?id=";
		echo $user["id"];
		echo "'>Edit</a>";
		echo "<br>";
	}

?>
<br>
<a href="admin_newadmin.php">Insert a new admin</a>
<br>
</div>
</div>
<?php include "footer.php"; ?>
