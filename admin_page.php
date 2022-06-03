<?php  include "header.php"; ?>
<?php 
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	} 
	if (isset($_POST['logout'])) {	
		$_SESSION["power"] = "exit";
		header("Location: admin.php?message=Logout successfull!");
	}

?>
<div class="main">
<div class="sidebar">
	<!-- <a href="admin_page.php">Main Menu</a> -->
	<br>
<!-- <a href="new_subject.php">Add a new subject</a>	 -->
<br>
<!-- <a href="edit_showadmins.php">Edit admin</a>	 -->
<br>
<!-- <a href="admin_newadmin.php">Insert a new admin</a> -->
<br>

</div>
<!-- end of sidebar content -->
<div class="main_content">
	<!-- in this we will put all the main parts -->
	<!-- <h1><a href="display_subjectpages.php">Display all the subjects</a></h1> -->
	<h1><a href="admin_websitecontent.php">Manage website contents</a></h1>
	<h1><a href="edit_showadmins.php">Manage admins</a></h1>
	<form method="post" action="admin_page.php">
		<input type="submit" name="logout" value = "Logout">
	</form>

</div>
<!-- end of main content -->
</div>
<!-- end of main div -->
<?php
	include "footer.php"
?>
