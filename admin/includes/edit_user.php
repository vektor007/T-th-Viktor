
<?php


	if(isset($_GET['edit_user'])){
		
		$the_user_id = $_GET['edit_user'];
		echo $the_user_id;
	}




	if(isset($_POST['edit_user'])){
		
		
		$username = $_POST['username'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
		$user_role = $_POST['user_role'];

		
			move_uploaded_file($user_image_temp, "../images/$user_image");
			
			$query = "INSERT INTO users ( username, user_firstname, user_lastname, user_email, user_image, user_role )";
			$query .= "VALUES ('{$username}', '{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}' )";	
		
			$create_user_query = mysqli_query($connection, $query);
		
			if(!$create_user_query){
				
				die('QUERY FAILED' . mysqli_error($connection));
			} else {
				
				echo "USER SUCCESFULLY ADDED TO THE DATABASE";
			}
			
		
	}



?>




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
	<input type="text" class="form-control" name="username">	
	</div>
		
	
	<div class="form-froup">
	<label for="user_firstname">First Name</label>	
	<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
	<label for="user_lastname">Last Name</label>
	<input type="text" class="form-control" name="user_lastname">	
	</div>

	<div class="form-group">
	<label for="user_email">E-mail adress</label>
	<input type="text" class="form-control" name="user_email">	
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
-->
	
	<div>
	<input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
	</div>

</form>