<?php include "/admin_header.php"; ?>
<?php

	if(isset($_POST['create_post'])){
		
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category'];
		$post_author = $_POST['post_author'];
		$post_status = $_POST['post_status'];
		
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_comment_count = 0;
		
		
			move_uploaded_file($post_image_temp, "../images/$post_image");
		
		
			$query = "INSERT INTO posts (post_title, post_category_id, post_author, post_status, post_image, post_tags, post_content, post_date, post_comment_count)";
			$query .= "VALUES ('{$post_title}',{$post_category_id}, '{$post_author}','{$post_status}','{$post_image}','{$post_tags}','{$post_content}', now(), '{$post_comment_count}' )";	
		
			$create_post_query = mysqli_query($connection, $query);
				
			if(!$create_post_query){
				
				die("QUERY FAILED" . mysqli_error($connection));
			}else{
				
				$the_post_id = mysqli_insert_id($connection);
				echo "<p class='bg-success'>Post Created Succesfully. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>View all Post</p>";
				
			}
		
		
	}



?>




<form action="" method="post" enctype="multipart/form-data">


	<div class="form-group">
	<label for="title">Post Title</label>
	<input type="text" class="form-control" name="post_title">	
	</div>
	
<!--
	<div class="form-froup">
	<label for="post_category">Post Category ID</label>
	<input type="text" class="form-control" name="post_category_id">
	</div>
-->
	
	
	<div class="form-froup">
	<select name="post_category" id="post_category">
		
		<?php
		
			$query = "SELECT * FROM categories";
		   	$select_categories = mysqli_query($connection, $query);
		   
		    confirm($select_categories);
		   
		   		while ($row = mysqli_fetch_assoc($select_categories)){
					
					$cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];
					
					echo "<option value='{$cat_id}'>$cat_title</option>";
					
					
				}
		   
		
		?>
	
	</select>
	</div>

	<div class="form-group">
	<label for="title">Post Author</label>
	<input type="text" class="form-control" name="post_author">	
	</div>

	<div class="form-group">
	<select name="post_status" id="">
		<option value="draft">Post Status</option>
		<option value="publish">Published</option>
		<option value="draft">Draft</option>
	</select>	
	</div>

	<div class="form-group">
	<label for="post_image">Post Image</label>
	<input type="file" name="image">	
	</div>
	
	<div class="form-group">
	<label for="post_tags">Post Tags</label>
	<input type="text" class="form-control" name="post_tags">
	</div>
	
	<div class="form-group">
	<label for="post_content">Post Content</label>
	<textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>	
		<script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	</div>
	
	<div>
	<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>

</form>