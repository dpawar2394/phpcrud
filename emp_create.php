<?php  
    require('db_connection.php');//include 
    if(!isset($_SESSION['loggedIn'])) {
       header("Location: /deepak/test2.php/login.php"); 
    } 


    if(isset($_POST['create'])) {  
        $query = "INSERT INTO db1(firstname,lastname,email,password) VALUES(
          '".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['password']."')";  


        $result = $conn->query($query); 
        if($result === true) { 
          header("Location: /deepak/test2.php/emp_list.php"); 
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Emp Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="/deepak/test2.php/emp_list.php">Employees</a>
        </li>
        <li><a href="#">Companies</a></li>
        <li><a href="#">Profile</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/deepak/test2.php/logout.php">
          <?php echo ucwords($_SESSION['user_data']['firstname'].' '.$_SESSION['user_data']['lastname']);?> <br>
          <span class="glyphicon glyphicon-user"></span> Logout</a>
        </li> 
      </ul>
    </div>
  </nav>
  <h2>Create New Employee</h2>

  <form action="/deepak/test2.php/emp_create.php" method="POST">
    <div class="form-group">
      <label for="text">First Name:</label>
      <input type="text" class="form-control" placeholder="Enter first name" name="firstname">
    </div>
    <div class="form-group">
      <label for="text">Last Name:</label>
      <input type="text" class="form-control" placeholder="Enter last name" name="lastname">
    </div>
    <div class="form-group">
      <label for="text">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="text">Password:</label>
      <input type="text" class="form-control" placeholder="Enter password" name="password">
    </div>  
    <!-- <input type="text" class="form-control" placeholder="Enter city" name="city">  -->
    <button type="submit" name="create" class="btn btn-success" value="">Save</button>
  </form>


</div>

</body>
</html>
