<body>
	<?php include "functions.php"; ?>
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
<!--                            <small>You can edit here some stuff</small>-->
                        </h1>

                <?php 
				
						if(isset($_GET['source'])){
							$source = $_GET['source'];
						}else{
							$source = '';
						}
						
						switch($source){
								
							case 'add_user.php';
							include "includes/add_user.php";
							break;	
								
							case 'edit_user.php';
							include "includes/edit_user.php";
							break;	
								
							case '14';
							echo "NICE 14";
							break;
								
							default:
								include "includes/view_all_users.php";
							break;
						}
						
						
						
						
						
						
				?>
						
						
						
						
						
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
	

   