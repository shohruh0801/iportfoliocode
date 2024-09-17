<?php
require "db.php";
$admininform = mysqli_query($conn, "SELECT * FROM about");
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
			<li><a href="admin.php" class="nav-link active">About</a></li>
			<li><a href="result.php">Result</a></li>
            <li><a href="images.php" class="nav-link ">Picture</a></li>
            <li><a href="services.php" class="nav-link">Services</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>
    <?php
     if (isset($_POST['fullname']) && isset($_POST['birthday']) && isset($_POST['website']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['age']) && isset($_POST['degree']) && isset($_POST['email']) && isset($_POST['freelance']) && isset($_FILES['img']) ) {
        $fullname = $_POST['fullname'];
        $birthday = $_POST['birthday'];
        $website = $_POST['website'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $age = $_POST['age'];
        $degree = $_POST['degree'];
        $email = $_POST['email'];
        $freelance = $_POST['freelance'];
        $img_temp = $_FILES['img']['tmp_name'];
        $img_name = $_FILES['img']['name'];
        move_uploaded_file($img_temp, "./upload/". $img_name);
        $updt = mysqli_query($conn,"UPDATE about SET fullname='$fullname', birthday='$birthday',website='$website', phone='$phone', city='$city', age='$age', degree='$degree', email='$email', freelance='$freelance', img='$img_name'");
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
                <form  method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title" class="form-label">fullname</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">birthday</label>
                        <input type="text" class="form-control" name="birthday" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">website</label>
                        <input type="text" class="form-control" name="website" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">city</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">age</label>
                        <input type="text" class="form-control" name="age" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">degree</label>
                        <input type="text" class="form-control" name="degree" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">freelance</label>
                        <input type="text" class="form-control" name="freelance" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">img</label>
                        <input type="file" class="form-control" name="img" placeholder="Enter title">
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