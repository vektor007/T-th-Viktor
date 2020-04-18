<body>
	<?php include "functions.php"; ?>
	<?php include "includes/admin_header.php"; ?>
	
	<?php if(isset($_SESSION['username'])){
	
	$username = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '{$username}' ";
	$select_user_profile_query = mysqli_query($connection, $query);
	
	while($row = mysqli_fetch_array($select_user_profile_query)){
		
		$user_id = $row['user_id'];
		$username = $row['username'];
		$user_password = $row['user_password'];
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_image = $row['user_image'];	
		$user_role = $row['user_role'];	
		
		
	}
		
	} 
	
	
	if(isset($_POST['update_profile'])){
		
		
		$username = $_POST['username'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		$user_password = $_POST['user_password'];
//		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
		

		
//			move_uploaded_file($user_image_temp, "../images/$user_image");
		
//		$query = "SELECT randSalt FROM users";
//		$select_randsalt_query = mysqli_query($connection, $query);
//			
//			if(!$select_randsalt_query){
//				die("QUERY FAILED" . mysqli_error($connection));
//			}
//			
//		$row = mysqli_fetch_array($select_randsalt_query);
//		$salt = $row['randSalt'];
//		$hashed_password = crypt ($user_password, $salt);
		
			
			$query = "UPDATE users SET ";
			$query .="username = '{$username}', ";
			$query .="user_firstname = '{$user_firstname}', ";
			$query .="user_lastname = '{$user_lastname}', ";
			$query .="user_email = '{$user_email}', ";
			$query .="user_role = '{$user_role}', ";
			$query .="user_password = '{$user_password}' ";
			$query .="WHERE username = '{$username}' ";
		
		
		
			$update_user_profile_query = mysqli_query($connection, $query);
		
			if(!$update_user_profile_query){
				
				die('QUERY FAILED' . mysqli_error($connection));
			} else {
				
				$message = "PROFILE UPDATED";
			}
			
		
	}
	
	
	
	
	?>
	
	
	
	
	
    <div id="wrapper">

        <!-- Navigation -->

	<?php include "includes/admin_navigation.php"; ?>	

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						
						<h1 class="page-header">
                            Welcome in Admin panel
							<br>
							<br>
                            <small>You can edit your profile <span style="color:cornflowerblue"><?php echo $_SESSION['username'] ?></span></small>
                        </h1> 
	<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
	<select name="user_role" id="">User Role
		<option value="subscriber">Choose Role</option>
		<option value="admin">Admin</option>
		<option value="subscriber">Subscriber</option>
	</select>	
	</div>
	

	<div class="form-group">
	<label for="username">Username</label>
	<input value="<?php echo $username ?>" type="text" class="form-control" name="username">	
	</div>
		
	
	<div class="form-froup">
	<label for="user_firstname">First Name</label>	
	<input value="<?php echo $user_firstname ?>" type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
	<label for="user_lastname">Last Name</label>
	<input value="<?php echo $user_lastname ?>" type="text" class="form-control" name="user_lastname">	
	</div>
		
	<div>
	<label for="user_password">User Password</label>
	<input value="<?php echo $user_password ?>" class="form-control" type="password" name="user_password">	
	</div>	

	<div class="form-group">
	<label for="user_email">E-mail adress</label>
	<input value="<?php echo $user_email ?>" type="text" class="form-control" name="user_email">	
	</div>

	<div class="form-group">
	<label for="user_image">User Image</label>
	<input type="file" name="image">	
	</div>
	

	
<!--
	<div class="form-group">
	<label for="post_content">Post Content</label>
	<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>	
	</div>
-->	<div>
	<?php echo $message; ?>	
	</div>
	
	<div>
	<input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
	</div>

</form>
               
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		
		

    </div>
	
	
	
	
    <!-- /#wrapper -->
	
	<?php include "includes/admin_footer.php"; ?>
	

   