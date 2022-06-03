<?php include 'header.php'; ?>
<div class="main">
<div class="sidebar">
</div>
<!-- end of sidebar content -->
<div class="main_content">
<?php 
  if(!empty($_GET['message'])) {
      $message = $_GET['message'];
      // echo "You have been ";
      echo "<h2>";
      echo htmlspecialchars($message);
      echo "</h2>";
  }
?>
  <!-- in this we will put all the main parts -->
<br>
  <h1 id="login_heading">This is the admin login page:</h1>
  <table width="500px" height="250px"border="2px" cellpadding="2px" cellspacing="2px" align="center">
    <form action="login_checker.php" method="post">
    <tr>
      <td>Enter you're name:</td>
      <td><input type="text" name="uname" ></td>
    </tr>
    <tr>
      <td>Enter you're password:</td>
      <td><input type="password" name="password"></td>
    </tr>
  </table>
  <input type="submit" value="Submit!">
  </form>
</div>
<!-- end of main content -->
</div>
<!-- end of main div -->
<?php include 'footer.php'; ?>
 <!-- we are going to connect to the database right now -->
