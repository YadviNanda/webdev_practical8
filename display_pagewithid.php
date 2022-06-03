<?php include 'header.php'; ?>
<?php 
	if(!empty($_GET['message'])) {
      $message = $_GET['message'];
      echo htmlspecialchars($message);
      echo "<a href='admin_page.php'>Go back</a>";   
      exit();
  	}
	if(empty($_GET['id'])) {
      
      // echo "You have been ";
      echo "Please Retry!<br>";
      echo "<a href='index.php'>Go back</a>";
      exit();
  	}
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
		echo "<a href='index.php'>Go back</a>";
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
    <form action="update_pageswithid.php?id=<?php echo $ans[0]['id']; ?>" method="post">
    <tr>
      <td>Page name:</td>
      <td><input type="text" name="page_name" value="<?php echo $ans[0]["menu_name"] ?>" ></td>
    </tr>
    <tr>
      <td>Position:</td>
      <td><input type="number" name="position" value="<?php echo $ans[0]["position"]; ?>"></td>
    </tr>
    <tr>
      <td>Visible:</td>
      <td>Yes<input type="radio" name="input_user" value = "Yes"> No<input type="radio" name="input_user" value="No"></td>
    </tr>
    <tr>
	    <td>Content:</td>
	    <td>
	    	<textarea rows="5"  name="content">
	    		<?php echo $ans[0]["content"]; ?>
			</textarea>
  		</td>
  	</tr>
  </table>
  <input type="submit" name="submited" value="UPDATE"></input>
</form>
</div>
</div>
<?php
	// echo "<a href='update_pagewithid.php?id=$page_id'>Update Page</a><br>";    
	echo "<a href='admin_websitecontent.php'>Go back</a>";   
	include 'footer.php' 
?>
