<?php  
    require('db_connection.php');//include 
    if(isset($_SESSION['loggedIn'])) {
       header("Location: /deepak/test2.php/emp_list.php"); 
    } 

    if(isset($_POST['login'])) {  

        $query = "SELECT * from db1 WHERE email = '".$_POST['email']."' and password = '".$_POST['password']."'";  
        $result = $conn->query($query);  
        if($result->num_rows > 0) {  
          $data = $result->fetch_array(MYSQLI_ASSOC); 
          $_SESSION['loggedIn'] = true; 
          $_SESSION['user_data'] = $data;  
          header("Location: /deepak/test2.php/emp_list.php"); 
        } else {
          header("Location: /deepak/test2.php/login.php");
        } 
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>create employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Your Account</h2>

  <form action="/deepak/test2.php/login.php" method="POST"> 
    <div class="form-group">
      <label for="text">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="text">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password">
    </div>  
    <!-- <input type="text" class="form-control" placeholder="Enter city" name="city">  -->
    <button type="submit" name="login" class="btn btn-success" value="">Login</button>

  </form>


</div>

</body>
</html>
