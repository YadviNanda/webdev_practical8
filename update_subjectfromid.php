<?php include "header.php";?>
<?php 
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	$id = $_GET['id'];
$conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM subjects WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	if(empty($ans)){
    	echo "Wrong id!";
    	exit();
 	}


?>
<div class="main">
<div class="sidebar">
  <a href="admin_page.php">Main Menu</a>
  <br>
</div>
<div class="main_content">
<table width="500px" height="250px"border="2px" cellpadding="2px" cellspacing="2px" align="center">
    <form action="add_subject.php?update=<?php echo $ans[0]['id']; ?>" method="post">
    <tr>
      <td>Menu name:</td>
      <td><input type="text" name="menu_name" value="<?php echo $ans[0]['menu_name']; ?>" ></td>
    </tr>
    <tr>
      <td>Position:</td>
      <td><input type="number" name="position" value="<?php echo $ans[0]['position']; ?>"></td>
    </tr>
    <tr>
      <td>Visible:</td>
      <td>Yes<input type="radio" name="input_user" value = "Yes"> No<input type="radio" name="input_user" value="No"></td>
    
    </tr>
  </table>
  <input type="submit" name="submited" value="UPDATE"></input>
</form>
</div>
</div>
<h3><a href="admin_websitecontent.php">Return back</a></h3>
<?php include "footer.php"; ?>
