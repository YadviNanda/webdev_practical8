<?php include 'header.php'; ?>
<?php 
	if(empty($_GET['id'])) {
      
      // echo "You have been ";
      echo "Please Retry!<br>";
      echo "<a href='index.php'>Go back</a>";
      exit();
  	}
  	$page_id = $_GET['id'];
  	$page_name  =$_POST['page_name'];
	$position = $_POST['position'];
	$visibility = $_POST['input_user'];
	$content = $_POST['content'];
	// echo $page_id;
	// echo "$page_id pgid $page_name name $position pos $visibility vis";
  	// echo htmlspecialchars($page_id);
	if(empty($visibility)){
		header("Location: display_pagewithid.php?message=fill the form completely");
		exit();

	}

  	// we are going to start the main display part
  $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
	$sql = "SELECT * FROM pages WHERE id =$page_id";
	$result = mysqli_query($conn,$sql);
	//$ans contails the values of the sql query resutl
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// print_r($ans);
	if(empty($ans)){
		echo "wrong id!";
		exit();
	}
	//  $sql = "UPDATE admin SET hashed_password = '$hash' WHERE id ='$id'";
	$sql = "UPDATE pages SET menu_name = '$page_name', position = '$position',visible = '$visibility',content = '$content' WHERE id = $page_id";
	// echo $sql;
	$result = mysqli_query($conn,$sql);
	if($result!=0){
            echo "Page has been changed !";
            header("Location: display_pagewithid.php?message=Page has been changed!");
            // echo "<h3><a href='admin_page.php'>Return back</a></h3>";
            exit();
      }
      header("Location: display_pagewithid.php?message=There has been some errors so please retry!");
?>
