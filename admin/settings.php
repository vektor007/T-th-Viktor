<body>
	
	<?php include "includes/admin_header.php"; ?>
	
	
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
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				
				<?php
//					
				$query = "SELECT * FROM settings WHERE pagnation_id = 1";
				$select_all_settings = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_array($select_all_settings)){
					
					$pagnation_amount = $row['pagnation_amount'];
				}				
				
				if(isset($_POST['set_pagnation'])){
					
					$pagnation_number = $_POST['amount'];
					
					$query = "UPDATE settings SET pagnation_amount = '{$pagnation_number}' WHERE pagnation_id = 1";
					$update_pagnation_query = mysqli_query($connection, $query);
					
						if(!$update_pagnation_query){
							die("QUERY FAILED" . mysqli_error($connection));
						}else{
							header("Location: /cms/admin/settings.php");
						}
				}
								
				?>
				<form action="" method="post">	
				<div style="border: solid 1px #4E4E4E; padding-bottom: 45px;" class="col-lg-3">
					<h3 style="margin-bottom: 45px;">Settings of the page</h3>
					<label for="amount">Here you can set the numbers of post you want to seen on the index page.</label>
					<div class="input-group">
                        <input name="amount" placeholder="Amount post on the indexpage" type="text" class="form-control">
						<span class="input-group-btn">
						<button class="btn btn-primary" name="set_pagnation" type="submit">Set</button>
						</span>
                    </div>	
				</div>
				</form>
				
				
				
				
				

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
		
		
		

    </div>
	
	
	
	
    <!-- /#wrapper -->
	
	<?php include "includes/admin_footer.php"; ?>
	

   