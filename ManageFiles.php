<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Assistant's Dashboard</title>

    <script src="https://kit.fontawesome.com/9778dd3679.js" crossorigin="anonymous"></script>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="ManageFiles.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
  
  <div class="header">
    <h1>Office Assistant's Dashboard</h1> 
    <a href="OfficeAssistantPage.html"><p class="home"><i class="fa-solid fa-house-user"></i> Home</p> </a> 
    <a href="logInPage.html"><p class="log-out"><i class="fa-solid fa-right-from-bracket"></i> log out</p> </a>
  </div>
    

<div class="buttons text-center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add File</button>&nbsp; &nbsp;
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Search File</button>
</div>
<br>

<!-- Add File Modal Starts here -->
    
<form action="addFile.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            
              <div class="mb-3">
                <label for="YourID" class="col-form-label">File Name:</label>
                <input type="text" class="form-control" id="FileName" name="FileName">
              </div>

              <div class="mb-3">
                <label for="YourID" class="col-form-label">File Category:</label>
                <input type="text" class="form-control" id="FileCategory" name="FileCategory">
              </div>

              <div class="mb-3">
                <label for="YourID" class="col-form-label">File Location:</label>
                <input type="text" class="form-control" id="FileLocation" name="FileLocation">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Add" name="add" id="add">
          </div>
        </div>
      </div>
    </div>
   </form>

    <!-- Add File Modal Ends here -->

    <!-- Search File Modal Starts here -->
    
<form action="searchFile.php" method="post">
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            
              <div class="mb-3">
                <label for="YourID" class="col-form-label">File Name:</label>
                <input type="text" class="form-control" id="FileName" name="fileName">
              </div>

            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Search" name="Search" id="Search">
          </div>
        </div>
      </div>
    </div>
   </form>

    <!-- Search File Modal Ends here -->
    

    <form action="UpdateFileLocation.php" method="post">
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <div class="mb-3">
                <label for="YourID" class="col-form-label">File ID:</label>
                <input type="text" class="form-control" id="FileName" name="fileID">
              </div>

            
              <div class="mb-3">
                <label for="YourID" class="col-form-label">Enter Updated File Location:</label>
                <input type="text" class="form-control" id="FileLocation" name="FileLocation">
              </div>

            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Update" name="Search" id="Search">
          </div>
        </div>
      </div>
    </div>
   </form>
    
    
  <?php
     include('DatabaseConnection.php');
    
  
    
    $sql= "select * from file";
    $fetchfile= mysqli_query($conn,$sql);
    
    
    
    if(mysqli_num_rows($fetchfile) > 0)
    {
  ?>
  <table>
    <tr>
      <th>Id</th>
      <th>File Name</th>
      <th>File Location</th>
      <th>File Category</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  <?php
      while($row= mysqli_fetch_assoc($fetchfile))
      {      
        $id=$row['id'];
        $FileName=$row['FileName'];
        $FileLocation=$row['FileLocation'];
        $FileCategory=$row['FileCategory'];
        $Date=$row['Date'];
              
  ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $FileName; ?> </td>
                    <td><?php echo $FileLocation; ?></td>
                    <td><?php echo $FileCategory; ?></td>
                    <td><?php echo $Date; ?></td>
                    <td>
                      
                      <a href="DeleteFileInfo.php?fileId=<?php echo $id; ?>" class="delete-button">Delete</a>
                      <a href="UpdateFileLocation.php?fileId=<?php echo $id; ?>" class="update-button" data-bs-toggle="modal" data-bs-target="#exampleModal3">UpdateLocation</a>
                      


                      
      
                    </td>
                </tr>
      
  <?php   
      }
    }
    else
    {
      echo '<script>alert("No file info to show.!");
      </script>';
    }
   
  ?>
    
      
    </table>

    
</body>
</html>