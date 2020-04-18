<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>


	<?php 
		if(isset($_POST['submit'])){
			$user_firstname = $_POST['user_firstname'];
			$user_lastname = $_POST['user_lastname'];
 			$username = $_POST['username'];
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
			
				if(!empty($user_firstname) && !empty($user_lastname) && !empty($username) && !empty($user_email) && !empty($user_password)){
					
					$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
					$user_lastname = mysqli_real_escape_string($connection, $user_lastname);
					$username = mysqli_real_escape_string($connection, $username);
					$user_email = mysqli_real_escape_string($connection, $user_email);
					$user_password = mysqli_real_escape_string($connection, $user_password);
			
					$user_password = password_hash($user_password, PASSWORD_BCRYPT); 
					
				
			
			$query = "INSERT INTO users (user_firstname, user_lastname, username, user_email, user_password, user_role)";
			$query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_email}', '{$user_password}', 'subscriber')";
			$register_user_query = mysqli_query($connection, $query);
				
				if(!$register_user_query){
					
					die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
				}	
					
					$message = "Successfully registered. You can log in <a href='index.php'>here</a>";
					
					echo $user_password;
					echo "<br>";
					echo strlen($user_password);
					
			}else{
					$message = "Fields cannot be empty";
				 }
		}else{
			
			$message = "";
		}

	?>
 
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
						<div class="form-group" >
							<label for="user_firstname" class="sr-only">First Name</label>
							<input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="Enter First Name">	
						</div>
						<div class="form-group">
							<label for="user_lastname" class="sr-only">Last Name</label>
							<input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter Last Name">
						</div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="user_password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
						
						<div class="form-group" style="text-align: center; padding-top: 15px;">
							<?php echo $message; ?>
						</div>
						
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
