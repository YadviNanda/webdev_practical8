<?php 
      session_start(); 
      if($_SESSION["power"]!= "admin"){
            echo "You are not the admin!";
            exit();
      }
      if(!empty($_GET['id'])) {
      $id = $_GET['id'];
      $pass = $_POST['password'];
      $c_pass = $_POST['c_password'];

      if($c_pass !=$pass){
            echo "wrong password! Go back!";
            echo "<h3><a href='admin_page.php'>Return back</a></h3>";
            exit();
      }
      // echo "You have been ";
      // echo htmlspecialchars($id);
      $conn = mysqli_connect('localhost','Ashdeep','Ashdeep','project');
      // // UPDATE table_name
      //   // SET column1 = value1, column2 = value2, ...
      //   // WHERE condition; 
      $hash = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "UPDATE admin SET hashed_password = '$hash' WHERE id ='$id'";
      // echo $sql;
      $result = mysqli_query($conn,$sql);
      // echo $result;
      if($result!=0){
            echo "Password Has been changed !";
            echo "<h3><a href='admin_page.php'>Return back</a></h3>";
            exit();
      }
      echo "There has been some errors so please retry!";
      echo "<h3><a href='admin_page.php'>Return back</a></h3>";
      exit();
      }

?>
