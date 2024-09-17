<?php
require "db.php";
$admininform = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Example Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">;
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		
		.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			width: 250px;
			height: 100vh;
			background-color: #333;
			color: #fff;
			padding: 20px;
		}
		
		.sidebar ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		
		.sidebar li {
			margin-bottom: 20px;
		}
		
		.sidebar a {
			color: #fff;
			text-decoration: none;
		}
		
		.sidebar a:hover {
			color: #ccc;
		}
		
		.content {
			margin-left: 250px;
			padding: 20px;
		}
        .modal-body {
        padding: 20px;
      }
	</style>
</head>
<body>
	<div class="sidebar">
		<ul>
			<li><a href="index.php">IPORTFOLIO</a></li>
			<li><a href="admin.php">About</a></li>
			<li><a href="result.php">Result</a></li>
            <li><a href="images.php" class="nav-link ">Picture</a></li>
            <li><a href="services.php" class="nav-link active">Services</a></li>
			<li><a href="contact.php" class="nav-link ">Contact</a></li>
		</ul>
	</div>
    
    <?php

$admininform = mysqli_query($conn, "SELECT * FROM services");


if (isset($_POST['text'])&& isset($_POST['inform'])) {

  $text = $_POST['text'];
  
  $inform = $_POST['inform'];

  $ins = "INSERT INTO services (text, inform) VALUES ('$text', '$inform')";
  $ins = mysqli_query($conn, $ins);


  
}
?>
	<div class="content">
   
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    
    +Change Result
</button>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  method="POST">
                    <div class="form-group">
                        <label for="title" class="form-label">text</label>
                        <input type="text" class="form-control" name="text" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">inform</label>
                        <input type="text" class="form-control" name="inform" placeholder="Enter title">
                    </div>
                
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	</div>
</body>
</html>