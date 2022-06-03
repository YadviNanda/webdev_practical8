<?php 
  include "header.php";
?>
<?php 
//this apage is to add a new admin
  session_start(); 
  if($_SESSION["power"]!= "admin"){
    return_back(); 
  }
?>
<?php 
  $subject_id = $_GET['subject_id'];
  if(empty($subject_id)){
    header("Location: display_subjectpages.php?message=you have to restart after a failed attempt!");
    exit();
  }
  echo "$subject_id";
  $menu_name  =$_POST['menu_name'];
  $position = $_POST['position'];
  $visibility = $_POST['input_user'];
  $content = $_POST['content'];
  // echo "$subject_id is the id of the subject <br> $position is the pos <br> $visibility is visi<br>";
  // echo " $content the content";
  $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
  $sql = "SELECT * FROM pages WHERE subject_id = '$subject_id'AND position = '$position'";
  // print($sql);
  $result = mysqli_query($conn,$sql);
  //$ans contails the values of the sql query resutl
  $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
  //to check if the username was found in the database , if not then we will exit and provide a text f not found in the webpage
  if(!empty($ans)){
    header("Location: display_subjectpages.php?message=error_position_or_menuname_is_same!");
    exit();
  }
  // print_r($ans);
  // now to save the given values in the databse
  $sql = "INSERT INTO pages(subject_id,menu_name,position,visible,content) VALUES ('$subject_id','$menu_name','$position','$visibility','$content')";
  // print($sql);
  if(mysqli_query($conn,$sql)){
    echo "success!!!";
    header("Location: display_subjectpages.php?message=successfully created a new page now you need to go back");
  }
  else{
    echo "connection error!!". mysqli_error($conn);
  }
?>
