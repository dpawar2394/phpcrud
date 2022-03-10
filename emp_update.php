<?php
    require('db_connection.php');//include
    if(!isset($_SESSION['loggedIn'])) {
       header("Location: /deepak/test2.php/login.php"); 
    } 


    //Submit Form code start
    if(isset($_POST['update'])) {  
      //echo '<pre>';print_r($_POST);die();  
       $query = "update db1 SET firstname = '".$_POST['firstname']."', lastname = '".$_POST['lastname']."',email = '".$_POST['email']."',password = '".$_POST['password']."' WHERE id = '".$_POST['id']."'"; 
       if($conn->query($query) === true) {
          header("Location: /deepak/test2.php/emp_list.php");
       } else {
          header("Location: /deepak/test2.php/emp_update.php?id=".$_POST['id']);
       } 
    }  
    //Submit form code end 

    //Fetch Data code start
    $userData = array(); 
    if(isset($_GET['id'])) {  
      $search = $conn->query("SELECT * from db1 where id = '".$_GET['id']."'");
      if($search->num_rows === 0) {
         header("Location: /deepak/test2.php/emp_list.php");
      } 
      $userData = $search->fetch_array(MYSQLI_ASSOC); 
    } else {
      header("Location: /deepak/test2.php/emp_list.php"); 
    }
    //Fetch Data code end



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Employee</title>
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
  <h2>Update New Employee</h2>

  <form action="/deepak/test2.php/emp_update.php" method="POST">

    <div class="form-group">
      <label for="text">First Name:</label>
      <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="<?php echo (isset($userData['firstname'])?$userData['firstname']:'');?>">
    </div>

    <div class="form-group">
      <label for="text">Last Name:</label>
      <input type="text" class="form-control" placeholder="Enter last name" name="lastname" value="<?php echo (isset($userData['lastname'])?$userData['lastname']:'');?>">
    </div>

    <div class="form-group">
      <label for="text">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email" value="<?php echo (isset($userData['email'])?$userData['email']:'');?>">
    </div>
    <div class="form-group">
      <label for="text">Password:</label>
      <input type="text" class="form-control" placeholder="Enter password" name="password" value="<?php echo (isset($userData['password'])?$userData['password']:'');?>">
    </div>  
    <input type="hidden" name="id" value="<?php echo (isset($userData['id'])?$userData['id']:'0');?>">  
    <button type="submit" name="update" class="btn btn-success" value="">Update</button>

  </form>


</div>

</body>
</html>
