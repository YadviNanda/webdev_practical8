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
	$id =$_GET["id"];
	// echo "$id is the id";
// we need to create a form for this s that we can take the values and use is for the furthre query!
?>
<div class="main">
<div class="sidebar">
  <a href="admin_page.php">Main Menu</a>
  <br>
</div>
<div class="main_content">
<form action="insert_newpageforsubject.php?subject_id=<?php echo "$id"; ?>" method="post">
	<table width="500px" height="250px"border="2px" cellpadding="2px" cellspacing="2px" align="center">
	    <tr>
	      <td>Page name:</td>
	      <td><input type="text" name="menu_name" ></td>
	    </tr>
	    <tr>
	      <td>Position:</td>
	      <td><input type="number" name="position"></td>
	    </tr>
	    <tr>
	      <td>Visible:</td>
	      <td>Yes<input type="radio" name="input_user" value = "Yes"> No<input type="radio" name="input_user" value="No"></td>
	    </tr>
	    <tr>
	      <td>Content:</td>
	    	<td>
	    	<textarea rows="5"  name="content">
			</textarea>
			</td>
	    </tr>
  	</table>
  <input type="submit" value="Submit">
</form>
</div>
</div>
<!-- need to change the locations in this for most of the pages -->
<h3><a href="admin_websitecontent.php">Return back</a></h3>
<?php include "footer.php"; ?>