<?php 
    require('db_connection.php');//include   
    //session_destroy(); 
    if(!isset($_SESSION['loggedIn'])) {
       header("Location: /deepak/test2.php/login.php"); 
    } 


    $result = $conn->query("SELECT * FROM db1");  
    if(isset($_GET['del_id'])) {  
        $query = "DELETE FROM db1 WHERE id = '".$_GET['del_id']."'";  
        if($conn->query($query) === true) { 
          header("Location: /deepak/test2.php/emp_list.php"); 
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> 
  </script>
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

  <h2>Employee List</h2>
  <p class="float-left" style="float: left">manage your all employess here</p>   
  <p>
    <a href="/deepak/test2.php/emp_create.php" class="btn btn-success" style="float: right;margin-bottom: 19px;">Add</a>
  </p>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th> 
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody> 
      <?php if ($result->num_rows > 0) {  while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['firstname'];?></td>
          <td><?php echo $row['lastname'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['password'];?></td>
          <td>
            <a href="/deepak/test2.php/emp_update.php?id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a> 
            <a href="/deepak/test2.php/emp_list.php?del_id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a> 
          </td>
        </tr> 
      <?php }} ?>
    </tbody>
  </table>
</div>

</body>
</html>
